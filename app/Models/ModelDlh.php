<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class ModelDlh extends Authenticatable
{
    use HasFactory, HasApiTokens;
    protected $table = 'dlh';
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
        'email',
        'password',
        'name',
        'provinsi',
        'username'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }



}
