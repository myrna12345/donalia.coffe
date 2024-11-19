<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_bahan',             
        'kategori',               
        'harga',                  
        'jumlah',                 
        'tanggal_masuk',          
        'tanggal_kadaluarsa',     
        'bahan_sering_digunakan', 
        'bahan_jarang_digunakan',
    ];
}