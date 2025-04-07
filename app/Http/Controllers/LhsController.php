<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lhs;
use Illuminate\Support\Facades\Auth;

class LhsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Mahasiswa
        if ($user->role_id == 1) {
            $lhsList = Lhs::where('nrp_nip', $user->nrp_nip)->get();
            return view('student.lhs.index', compact('lhsList'));
        }
        // Kaprodi
        elseif ($user->role_id == 2) {
            $lhsList = Lhs::whereHas('user', function ($query) use ($user) {
                $query->where('prodi_id', $user->prodi_id);
            })->get();
            return view('lecturer.lhs.index', compact('lhsList'));
        }
        // Manager Operasional
        elseif ($user->role_id == 3) {
            $lhsList = lhs::where('status', 1)
                ->whereHas('user', function ($query) use ($user) {
                    $query->where('prodi_id', $user->prodi_id);
                })->get();
            return view('manager.lhs.index', compact('lhsList'));
        }
        // Role lain
        else {
            abort(403, 'Akses ditolak.');
        }


    }

    // Mahasiswa
    public function create()
    {
        return view('student.lhs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'keperluan_pembuatan_laporan' => 'required|string',
        ]);

        $user = Auth::user();

        Lhs::create([
            'id' => time(),
            'nrp_nip' => $user->nrp_nip,
            'nama_lengkap' => $user->nama_lengkap,
            'keperluan_pembuatan_laporan' => $request->keperluan_pembuatan_laporan,
            'status' => 0,
        ]);

        return redirect()->route('student.index')->with('status', 'Form berhasil diajukan');
    }

    // Kepala Program Studi
    public function approve($id)
    {
        $lhs = Lhs::findOrFail($id);
        $lhs->status = 1;
        $lhs->save();

        return redirect()->back()->with('status', 'Laporan Hasil Studi berhasil disetujui.');
    }

    public function reject($id)
    {
        $lhs = Lhs::findOrFail($id);
        $lhs->status = 2;
        $lhs->save();

        return redirect()->back()->with('status', 'Laporan Hasil Studi berhasil ditolak.');
    }

    // Manajer Operasional
    public function sendPdf(Request $request, $id)
    {
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:2048',
        ]);

        $lhs = Lhs::findOrFail($id);

        // Simpan file
        $pdfPath = $request->file('pdf_file')->store('pdfs/lhs', 'public');

        // Update data
        $lhs->pdf_file = $pdfPath;
        $lhs->status = 3;
        $lhs->save();

        return redirect()->back()->with('success', 'PDF berhasil dikirim!');
    }


}
