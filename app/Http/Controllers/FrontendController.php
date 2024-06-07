<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\keranjang;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{

    public function AllPesanan()
    {
        $kategori = Kategori::all();
        $krnjg = keranjang::get();
        $cartItemsCount = Keranjang::where('user_id', Auth::id())->count();

    return view('Admin.Feedback.all', compact('cartItemsCount','kategori'));
    }
    public function index()
    {
        $kategori = Kategori::all();
        $krnjg = keranjang::get();
        $cartItemsCount = Keranjang::where('user_id', Auth::id())->count();
        return view('User.Home', compact('cartItemsCount','kategori'));
    }
    public function User()
    {
        $kategori = Kategori::all();
        $cartItemsCount = Keranjang::where('user_id', Auth::id())->count();

        return view('User.Home', compact('kategori','cartItemsCount'));
    }

    public function aboutus()
    {
        $kategori = Kategori::all();
        $cartItemsCount = Keranjang::where('user_id', Auth::id())->count();

        return view('User.about', compact('kategori','cartItemsCount'));
    }

    public function reservasi()
    {
        $kategori = Kategori::all();
        $cartItemsCount = Keranjang::where('user_id', Auth::id())->count();

        return view('User.reservasi', compact('kategori','cartItemsCount'));
    }

    public function Kategori($slug)
    {
        $kategori = Kategori::all();
        $kategoris = Kategori::where('slug', $slug)->firstOrFail();
        $item = $kategoris->produk()->get();
        $cartItemsCount = Keranjang::where('user_id', Auth::id())->count();

        return view('User.menu', compact('kategori', 'item','cartItemsCount'));
    }
}
