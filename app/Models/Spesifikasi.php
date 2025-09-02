<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesifikasi extends Model
{
    use HasFactory;
    protected $table = 'spesifikasi';
    protected $primaryKey = 'Id';
    
    public function item()
    {
        return $this->belongsTo(Item::class, 'IdItem', 'Id');
    }
}
