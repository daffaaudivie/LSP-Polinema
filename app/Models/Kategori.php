<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'nama',
        'keterangan',
    ];

    // Relasi: 1 Kategori bisa punya banyak Surat
    public function surat()
    {
        return $this->hasMany(Surat::class, 'kategori_id');
    }
}
