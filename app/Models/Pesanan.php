<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    public $timestamps = false;
    protected $fillable = ['nama','meja','waktu','tanggal'];
}
