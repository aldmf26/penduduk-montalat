<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datang extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id', 'id');
    }
}
