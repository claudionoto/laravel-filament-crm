<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Practice extends Model
{
    use HasFactory;
    use SoftDeletes;


    public static function getPracticeStatuses(): array {
        return [
            'Inserted',
            'Processing',
            'Completed',
            'Done'
        ];
    }



    public function account() {
        return $this->hasOne(Account::class,'id','id_account');
    }
    public function customer() {
        return $this->hasOne(Customer::class,'id','customer_id');
    }
    public function product() {
        return $this->hasOne(Product::class,'id','product_id');
    }
}
