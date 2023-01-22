<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function surat_masuk()
    {
        return $this->belongsToMany(SuratMasuk::class);
    }
}