<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'nrp_nip';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['nrp_nip', 'nama_lengkap', 'email', 'password', 'role', 'status'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('studentsOnly', function ($query) {
            $query->where('role', '0');
        });
    }
}
