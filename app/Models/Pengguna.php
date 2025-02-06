<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'pengguna';

    protected $fillable = [
        'nama',
        'username',
        'password',
        'bagian_id',
        'jabatan_id',
        'peran_id',
        'login_aplikasi',
    ];

    public function bagian()
    {
        return $this->belongsTo(Bagian::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function peran()
    {
        return $this->belongsTo(Peran::class);
    }

    // Fungsi untuk enklripsi password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
