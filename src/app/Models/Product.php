<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected  $fillable = [
        'id_brand',
        'name',
        'notes',
        'active'
    ];

    public function brand() {
        return $this->hasOne(Brand::class,'id','id_brand');
    }
}
