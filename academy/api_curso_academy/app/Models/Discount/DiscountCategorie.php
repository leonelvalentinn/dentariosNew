<?php

namespace App\Models\Discount;

use App\Models\Course\Categorie;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DiscountCategorie extends Model
{
    use HasFactory;
    protected $fillable = [
       "discount_id",
       "categorie_id",
    ];

    public function setCreatedAtAttributte($value){
     date_default_timezone_set("America/Mexico_City");
     $this->attributes["created_at"] = Carbon::now();

    }

    public function setUpdatedAtAttributte($value){
     date_default_timezone_set("America/Mexico_City");
     $this->attributes["updated_at"] = Carbon::now();

    }

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}