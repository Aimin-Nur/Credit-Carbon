<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ModelArtikel extends Model
{
    use HasFactory;
    protected $table = 'artikel';

    protected $keyType = 'string'; // Mengatur tipe data kunci utama
    public $incrementing = false; // Menonaktifkan inkremental

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    protected $fillable = [
        'id',
        'gambar',
        'kategori',
        'status',
        'isi',
    ];

}
