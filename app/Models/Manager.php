<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'nrp_nip';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['nrp_nip', 'nama_lengkap', 'email', 'password', 'role', 'status'];
}
