<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMSSeller extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "Sellers";
    public $timestamps=false;
    protected $primaryKey="S_id";

}
