<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\keranjang;

class FrontendController extends Controller
{

    public function AllPesanan()
    {
        $kategori = Kategori::all();
        $krnjg = keranjang::get();
        return view('Admin.Feedback.all', compact('krnjg','kategori'));
    }
    public function index()
    {
        $krnjg = keranjang::get();
        $kategori = Kategori::all();
        return view('User.Home', compact('krnjg','kategori'));
    }
    public function User()
    {
        $kategori = Kategori::all();
        return view('User.Home', compact('kategori'));
    }

    public function aboutus()
    {
        $kategori = Kategori::all();
        return view('User.about', compact('kategori'));
    }

    public function reservasi()
    {
        $kategori = Kategori::all();
        return view('User.reservasi', compact('kategori'));
    }

    public function Kategori($slug)
    {
        $kategori = Kategori::all();
        $kategoris = Kategori::where('slug', $slug)->firstOrFail();
        $item = $kategoris->produk()->get();

        return view('User.menu', compact('kategori', 'item'));
    }
}
