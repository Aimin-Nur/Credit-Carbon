<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ModelTransaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';

    protected $primaryKey = 'idTransaksi';
    protected $keyType = 'string'; // Mengatur tipe data kunci utama
    public $incrementing = false; // Menonaktifkan inkremental

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->idTransaksi = (string) Str::uuid();
        });
    }

    protected $fillable = [
        'idTransaksi',
        'idUser',
        'idPlant',
        'sumOfCarbon',
        'sumOfPoint',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }

    public function plant()
    {
        return $this->hasOne(ModelPlant::class, 'idTransaksi');
    }
}
