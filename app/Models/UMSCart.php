<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UMSProducts;
use App\Models\UMSCustomer;

class UMSCart extends Model
{
    use HasFactory;
    protected $table = "cart";
    public $timestamps=false;
    protected $primaryKey='cart_id'; 

    


}
