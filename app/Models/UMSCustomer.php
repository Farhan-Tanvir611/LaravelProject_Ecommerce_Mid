<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UMSOrders;
use App\Models\UMSCart;

class UMSCustomer extends Model
{
    use HasFactory;
    protected $table = "Customers";
    public $timestamps=false;
    protected $primaryKey="C_id";

  /*  public function orders(){
        return $this->hasMany(UMSOrders::class,'C_id','C_id');
    }*/
    public function Customercart(){
        return $this->hasMany(UMSCart::class,'C_id','C_id');
    }
}
