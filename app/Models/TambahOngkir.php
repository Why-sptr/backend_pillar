<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TambahOngkir extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $table = "tambah_ongkirs";
    protected $dates = ['deleted_at'];

    public function tujuan()
    {
        return $this->belongsTo(Tujuan::class);
    }

}
