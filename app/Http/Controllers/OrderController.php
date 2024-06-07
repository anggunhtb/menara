<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'items.product'])->get();
        return view('admin.orders', compact('orders'));
    }

    public function updateStatus(Request $request)
    {
        $order = Order::find($request->order_id);
        if ($order) {
            $order->status = $request->status;
            $order->save();
            return redirect()->route('admin.orders')->with('success', 'Status pesanan berhasil diperbarui.');
        }
        return redirect()->route('admin.orders')->with('error', 'Pesanan tidak ditemukan.');
    }
}
