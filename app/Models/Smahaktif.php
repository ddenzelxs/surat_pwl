<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smahaktif extends Model
{
    use HasFactory;

    protected $table = 'smahaktif';
    public $timestamps = false;

    protected $fillable = [
        'id', 'nrp_nip', 'nama_lengkap', 'semester',
        'alamat', 'keperluan_pengajuan', 'pdf_file', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nrp_nip', 'nrp_nip');
    }
}
