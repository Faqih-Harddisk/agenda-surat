<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    public function index()
    {
        $surats = Surat::latest()->get();
        return view('surat.index', compact('surats'));
    }

    public function create()
    {
        return view('surat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat'       => 'required|string|max:255',
            'tanggal_surat'     => 'required|date',
            'pengirim_penerima' => 'required|string|max:255',
            'perihal'           => 'required|string|max:255',
            'jenis_surat'       => 'required|in:Masuk,Keluar',
        ]);

        $surat = Surat::create($request->all());

        // Simpan ke Log Aktivitas setelah berhasil menambahkan data
        ActivityLog::create([
            'username' => Auth::user()->name,
            'aktivitas' => 'Menambahkan surat baru dengan nomor: ' . $surat->nomor_surat,
        ]);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $surat = Surat::findOrFail($id);
        return view('surat.edit', compact('surat'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nomor_surat'       => 'required|string|max:255',
            'tanggal_surat'     => 'required|date',
            'pengirim_penerima' => 'required|string|max:255',
            'perihal'           => 'required|string|max:255',
            'jenis_surat'       => 'required|in:Masuk,Keluar',
        ]);

        $surat = Surat::findOrFail($id);
        $surat->update($request->all());

        // Simpan ke Log Aktivitas setelah berhasil memperbarui data
        ActivityLog::create([
            'username' => Auth::user()->name,
            'aktivitas' => 'Memperbarui surat dengan nomor: ' . $surat->nomor_surat,
        ]);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $surat = Surat::findOrFail($id);
        $surat->delete();

        // Simpan ke Log Aktivitas setelah berhasil menghapus data
        ActivityLog::create([
            'username' => Auth::user()->name,
            'aktivitas' => 'Menghapus surat dengan nomor: ' . $surat->nomor_surat,
        ]);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus.');
    }
    
    public function masuk()
    {
        $surats = Surat::where('jenis_surat', 'Masuk')->latest()->get();
        $title = 'Surat Masuk';
        return view('surat.index', compact('surats', 'title'));
    }

    public function keluar()
    {
        $surats = Surat::where('jenis_surat', 'Keluar')->latest()->get();
        $title = 'Surat Keluar';
        return view('surat.index', compact('surats', 'title'));
    }
}

 