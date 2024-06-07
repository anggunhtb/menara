<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tanggal_event' => 'required',
            'waktu_event' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'event' => 'required',
            'jumlah_anggota' => 'required',
        ]);

        Reservasi::create([
            'name' => $request->name,
            'tanggal_event' => $request->tanggal_event,
            'waktu_event' => $request->waktu_event,
            'address' => $request->address,
            'phone' => $request->phone,
            'event' => $request->event,
            'jumlah_anggota' => $request->jumlah_anggota,
        ]);

        return redirect()->back()->with('success', 'Pesanan tempat berhasil dibuat.');
    }
}
