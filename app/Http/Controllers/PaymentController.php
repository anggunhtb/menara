<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_Items;
use App\Models\Keranjang;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function checkout()
    {
        $cartItemsCount = Keranjang::where('user_id', Auth::id())->count();
        $user = Auth::user();
        $cartItems = Keranjang::where('user_id', $user->id)->get();
        $totalHarga = $cartItems->sum(function($item) {
            return $item->post->price * $item->kuantitas;
        });
        $kategori = Kategori::all();

        if ($cartItems->isEmpty()) {
            return redirect()->route('viewcart')->with('alert', 'Keranjang Anda kosong.');
        }

        return view('User.checkout', compact('totalHarga', 'kategori','cartItemsCount'));
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'metode_pembayaran' => 'required|string',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $order = new Order();
        $order->order_code = 'ORD-' . strtoupper(uniqid());
        $order->user_id = $user->id;
        $order->status = 'pending';
        $order->metode_pembayaran = $request->metode_pembayaran;
        $order->total_harga = $request->total_harga;

        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('bukti_pembayaran'), $filename);
            $order->bukti_pembayaran = $filename;
        }

        $order->save();

        $cartItems = Keranjang::where('user_id', $user->id)->get();
        foreach ($cartItems as $item) {
            $orderItem = new Order_Items();
            $orderItem->order_id = $order->id;
            $orderItem->post_id = $item->post_id;
            $orderItem->kuantitas = $item->kuantitas;
            $orderItem->save();
        }

        Keranjang::where('user_id', $user->id)->delete();

        return redirect()->route('homepageUser')->with('success', 'Pembayaran berhasil, silakan tunggu konfirmasi.');
    }
}
