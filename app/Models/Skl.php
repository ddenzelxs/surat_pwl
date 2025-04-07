<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skl extends Model
{
    use HasFactory;

    protected $table = 'skl';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nrp_nip',
        'nama_lengkap',
        'tanggal_lulus',
        'pdf_file',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nrp_nip', 'nrp_nip');
    }
}
