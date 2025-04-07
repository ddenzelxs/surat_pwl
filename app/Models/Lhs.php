<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lhs extends Model
{
    use HasFactory;

    protected $table = 'lhs';

    public $timestamps = false; // karena tidak ada kolom created_at / updated_at

    protected $primaryKey = ['id', 'nrp_nip']; // composite primary key (manual handling)
    public $incrementing = false; // karena id bukan auto-increment

    protected $keyType = 'string'; // karena salah satu primary key (nrp_nip) string

    protected $fillable = [
        'id',
        'nrp_nip',
        'nama_lengkap',
        'keperluan_pembuatan_laporan',
        'pdf_file',
        'status',
    ];

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class, 'nrp_nip', 'nrp_nip');
    }
}
