<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Menentukan nama tabel (opsional, karena Laravel otomatis mendeteksi bentuk jamak 'orders')
    protected $table = 'orders';

    // Izinkan kolom-kolom ini diisi data secara massal
    protected $fillable = [
        'product_name',
        'price',
        'status'
    ];
}
