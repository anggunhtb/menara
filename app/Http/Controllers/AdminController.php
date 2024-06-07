<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $reservasi = Reservasi::all();
        $kategori=Kategori::all();
        return view('Admin.reservasi.reservasis', compact('reservasi','kategori'));
    }

    public function approve(Request $request, $id)
    {
        $reservasi = Reservasi::find($id);
        $reservasi->status = 'Approved';
        $reservasi->save();

        return redirect()->back()->with('success', 'Data berhasil diapprove.');
    }
    public function reject(Request $request, $id)
{
    $reservasi = Reservasi::find($id);
    $reservasi->status = 'Rejected';
    $reservasi->save();

    return redirect()->back()->with('success', 'Data berhasil ditolak.');
}

}

