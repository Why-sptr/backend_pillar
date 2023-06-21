<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "tujuan";

    public function tambahongkir()
    {
        return $this->hasMany(TambahOngkir::class);
    }
}
