<?php

namespace App\Http\Controllers;

use App\Models\Skl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SklController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Mahasiswa
        if ($user->role_id == 1) {
            $sklList = Skl::where('nrp_nip', $user->nrp_nip)->get();
            return view('student.skl.index', compact('sklList'));
        // Kepala Program Studi
        } elseif ($user->role_id == 2) {
            $sklList = Skl::whereHas('user', function ($query) use ($user) {
                $query->where('prodi_id', $user->prodi_id);
            })->get();
            return view('lecturer.skl.index', compact('sklList'));
        // Manajer Operasional
        } elseif ($user->role_id == 3) {
            $sklList = Skl::whereHas('user', function ($query) use ($user) {
                $query->where('prodi_id', $user->prodi_id);
            })->get();  
            return view('manager.skl.index', compact('sklList'));
        } else {
            abort(403, 'Akses ditolak.');
        }
    }

    // Mahasiswa
    public function create()
    {
        return view('student.skl.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_lulus' => 'required|date',
        ]);

        $user = Auth::user();

        Skl::create([
            'id' => time(),
            'nrp_nip' => $user->nrp_nip,
            'nama_lengkap' => $user->nama_lengkap,
            'tanggal_lulus' => $request->tanggal_lulus,
            'status' => 0,
        ]);

        return redirect()->route('student.index')->with('status', 'Pengajuan SKL berhasil dikirim');
    }

    // Kaprodi
    public function approve($id)
    {
        $skl = Skl::findOrFail($id);
        $skl->status = 1;
        $skl->save();

        return redirect()->back()->with('status', 'Surat Keterangan Lulus berhasil disetujui');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'keterangan_penolakan' => 'required|string|max:1000',
        ]);

        $skl = Skl::findOrFail($id);
        $skl->status = 2;
        $skl->keterangan_penolakan = $request->keterangan_penolakan;
        $skl->save();

        return redirect()->back()->with('status', 'Surat Keterangan Lulus ditolak dengan keterangan.');
    }

    // Manajer
    public function sendPdf(Request $request, $id)
    {
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:2048',
        ]);

        $skl = Skl::findOrFail($id);
        $pdfPath = $request->file('pdf_file')->store('pdfs/skl', 'public');

        $skl->pdf_file = $pdfPath;
        $skl->status = 3;
        $skl->save();

        return redirect()->back()->with('success', 'PDF berhasil dikirim');
    }
}
