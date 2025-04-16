<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public function index()
    {
        $prodis = Prodi::all();
        return view('admin.prodi.index', compact('prodis'));
    }

    public function create()
    {
        return view('admin.prodi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|max:100|unique:prodi,id',
            'nama_prodi' => 'required|string|max:100|unique:prodi,nama_prodi',
        ]);

        Prodi::create([
            'id'=> $request->id,
            'nama_prodi' => $request->nama_prodi,
        ]);

        return redirect()->route('prodi.index')->with('success', 'Program Studi berhasil ditambahkan.');
    }
}
