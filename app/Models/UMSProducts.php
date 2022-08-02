<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UMSOrders;
use App\Models\UMSCart;
class UMSProducts extends Model
{
    use HasFactory;
    protected $table = "Products";
    public $timestamps=false;
    protected $primaryKey="P_id";

    public function Productcart(){
        return $this->hasMany(UMSCart::class,'P_id','P_id');
    }
}
