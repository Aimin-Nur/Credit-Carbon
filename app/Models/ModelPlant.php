<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ModelPlant extends Model
{
    use HasFactory;
    protected $table = 'plant';

    protected $primaryKey = 'idPlant';
    protected $keyType = 'string'; // Mengatur tipe data kunci utama
    public $incrementing = false; // Menonaktifkan inkremental

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->idPlant = (string) Str::uuid();
        });
    }

    protected $fillable = [
        'idPlant',
        'jenis',
        'tinggi',
        'diameter',
        'status',
        'warna_daun',
        'lokasi',
        'totalCarbon',
    ];


    public function users()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }

    public function transaksi()
    {
        return $this->hasMany(ModelTransaksi::class, 'idTransaksi');
    }



}
