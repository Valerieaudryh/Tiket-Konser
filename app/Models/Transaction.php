<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'Id';

    public function item() {
        return $this->belongsTo(Item::class, 'Id');
    }

    public function spesifikasi() {
        return $this->belongsTo(Spesifikasi::class, 'Id');
    }

}
