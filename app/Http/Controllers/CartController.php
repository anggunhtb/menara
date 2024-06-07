<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Kategori;
use App\Models\Order;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $user = Auth::user();
        $product = Post::find($id);

        // Check if the item already exists in the cart
        $cart = Keranjang::where('user_id', $user->id)->where('post_id', $id)->first();

        if ($cart) {
            // Increment the quantity if the item already exists
            $cart->kuantitas += 1;
        } else {
            // Create a new cart item if it doesn't exist
            $cart = new Keranjang();
            $cart->user_id = $user->id;
            $cart->post_id = $product->id;
            $cart->kuantitas = 1; // default quantity
        }

        $cart->save();

        return redirect()->route('viewcart');
    }

    public function viewCart($slug = null)
    {
        $cartItemsCount = Keranjang::where('user_id', Auth::id())->count();
        $user = Auth::user();
        $cartItems = Keranjang::where('user_id', $user->id)->get();
        $kategori = Kategori::all();
        $orders = Order::with(['items.post'])->where('user_id', $user->id)->get();
    
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('alert', 'Keranjang Anda kosong.');
        }
    
        if ($slug) {
            $kategoris = Kategori::where('slug', $slug)->firstOrFail();
            $item = $kategoris->produk()->get();
        } else {
            $item = []; // or some default value, e.g., all products
        }
    
        return view('User.cart', compact('cartItems', 'kategori', 'item', 'cartItemsCount', 'orders'));
    }
    

    public function updateCart(Request $request)
    {
        $cartIds = $request->cart_id;
        $quantities = $request->kuantitas;

        foreach ($cartIds as $index => $cartId) {
            $cartItem = Keranjang::find($cartId);
            if ($cartItem) {
                $cartItem->kuantitas = $quantities[$index];
                $cartItem->save();
            }
        }

        return redirect()->route('viewcart');
    }
}