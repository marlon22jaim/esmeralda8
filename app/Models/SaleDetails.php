<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetails extends Model
{
    use HasFactory;

    //Convertir nombre del modelo en singular
    protected $fillable = ["price", "quantity", "product_id", "sale_id"];
}
