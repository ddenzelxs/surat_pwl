<?php

namespace App\Http\Controllers;

use App\Models\Smatkul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SmatkulController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role_id == 1) {
            $smatkulList = Smatkul::where('nrp_nip', $user->nrp_nip)->get();
            return view('student.smatkul.index', compact('smatkulList'));
        } elseif ($user->role_id == 2) {
            $smatkulList = Smatkul::whereHas('user', function ($q) use ($user) {
                $q->where('prodi_id', $user->prodi_id);
            })->get();
            return view('lecturer.smatkul.index', compact('smatkulList'));
        } elseif ($user->role_id == 3) {
            $smatkulList = Smatkul::where('status', 1)
                ->whereHas('user', function ($q) use ($user) {
                    $q->where('prodi_id', $user->prodi_id);
                })->get();
            return view('manager.smatkul.index', compact('smatkulList'));
        }

        abort(403, 'Akses ditolak.');
    }

    public function create()
    {
        return view('student.smatkul.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'surat_tujuan' => 'required',
            'nama_mata_kuliah' => 'required',
            'kode_mata_kuliah' => 'required',
            'semester' => 'required',
            'tujuan' => 'required',
            'topik' => 'required',
        ]);

        Smatkul::create([
            'nrp_nip' => Auth::user()->username,
            'surat_tujuan' => $request->surat_tujuan,
            'nama_mata_kuliah' => $request->nama_mata_kuliah,
            'kode_mata_kuliah' => $request->kode_mata_kuliah,
            'semester' => $request->semester,
            'tujuan' => $request->tujuan,
            'topik' => $request->topik,
            'status' => 0,
        ]);

        return redirect()->route('student.smatkul.index')->with('success', 'Surat berhasil diajukan.');
    }

    public function approve($id)
    {
        $surat = Smatkul::findOrFail($id);
        $surat->status = 1;
        $surat->save();

        return back()->with('success', 'Surat disetujui.');
    }

    public function reject($id)
    {
        $surat = Smatkul::findOrFail($id);
        $surat->status = 2;
        $surat->save();

        return back()->with('success', 'Surat ditolak.');
    }

    public function sendPdf(Request $request, $id)
    {
        $surat = Smatkul::findOrFail($id);

        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:2048',
        ]);

        $path = $request->file('pdf_file')->store('pdfs', 'public');

        $surat->pdf_file = $path;
        $surat->save();

        return back()->with('success', 'PDF berhasil dikirim.');
    }
}
