<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UMSProducts;
use App\Models\UMSCustomer;
use App\Models\UMSConfirm_Orders;

class UMSOrders extends Model
{
    use HasFactory;
    
    protected $table = "Orders";
    public $timestamps=false;
    protected $primaryKey='O_id'; 

    public function customers(){
        return $this->belongsTo(UMSCustomer::class,'C_id');
    }

    public function customerss(){
        return $this->belongsTo(UMSProducts::class,'P_id');
    }
    public function confirmordersmany(){
        return $this->hasMany(UMSConfirm_orders::class,'O_id','O_id');
    }
}
