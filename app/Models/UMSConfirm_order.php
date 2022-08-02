<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UMSOrders;

class UMSConfirm_order extends Model
{
    use HasFactory;
    protected $table = "Confirm_order";
    public $timestamps=false;
    protected $primaryKey="CO_id";


    
}
