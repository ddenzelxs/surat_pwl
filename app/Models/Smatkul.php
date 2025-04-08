<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Smatkul extends Model
{
    protected $table = 'smatkul';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nrp_nip',
        'surat_tujuan',
        'nama_mata_kuliah',
        'kode_mata_kuliah',
        'semester',
        'mahasiswa_data',
        'tujuan',
        'topik',
        'pdf_file',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nrp_nip', 'nrp_nip');
    }
}
