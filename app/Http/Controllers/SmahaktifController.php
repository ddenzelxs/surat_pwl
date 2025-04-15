<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Smahaktif;

class SmahaktifController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role_id == 1) {
            $smahaktifList = Smahaktif::where('nrp_nip', $user->nrp_nip)->get();
            return view('student.smahaktif.index', compact('smahaktifList'));
        } elseif ($user->role_id == 2) {
            $smahaktifList = Smahaktif::whereHas('user', function ($query) use ($user) {
                $query->where('prodi_id', $user->prodi_id);
            })->get();
            return view('lecturer.smahaktif.index', compact('smahaktifList'));
        } elseif ($user->role_id == 3) {
            $smahaktifList = Smahaktif::whereHas('user', function ($query) use ($user) {
                $query->where('prodi_id', $user->prodi_id);
            })->get();
            return view('manager.smahaktif.index', compact('smahaktifList'));
        }

        abort(403, 'Akses ditolak.');
    }

    public function create()
    {
        return view('student.smahaktif.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'semester' => 'required|integer|min:1',
            'alamat' => 'required|string',
            'keperluan_pengajuan' => 'required|string',
        ]);

        $user = Auth::user();

        Smahaktif::create([
            'id' => time(),
            'nrp_nip' => $user->nrp_nip,
            'nama_lengkap' => $user->nama_lengkap,
            'semester' => $request->semester,
            'alamat' => $request->alamat,
            'keperluan_pengajuan' => $request->keperluan_pengajuan,
            'status' => 0,
        ]);

        return redirect()->route('student.index')->with('status', 'Pengajuan surat keterangan aktif berhasil dikirim.');
    }

    public function approve($id)
    {
        $smahaktif = Smahaktif::findOrFail($id);
        $smahaktif->status = 1;
        $smahaktif->save();

        return redirect()->back()->with('status', 'Pengajuan disetujui.');
    }

    public function reject($id)
    {
        $smahaktif = Smahaktif::findOrFail($id);
        $smahaktif->status = 2;
        $smahaktif->save();

        return redirect()->back()->with('status', 'Pengajuan ditolak.');
    }

    public function sendPdf(Request $request, $id)
    {
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:2048',
        ]);

        $smahaktif = Smahaktif::findOrFail($id);
        $path = $request->file('pdf_file')->store('pdfs/smahaktif', 'public');

        $smahaktif->pdf_file = $path;
        $smahaktif->status = 3;
        $smahaktif->save();

        return redirect()->back()->with('success', 'PDF berhasil dikirim.');
    }
}
