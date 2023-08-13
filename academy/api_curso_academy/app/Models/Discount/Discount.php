<?php

namespace App\Models\Discount;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        
        "code",
        "type_discount",
        "discount",
        "start_date",
        "end_date",
        "discount_type",
        "type_campaing",
        "state",
    ];

    
    public function setCreatedAtAttributte($value){
     date_default_timezone_set("America/Mexico_City");
     $this->attributes["created_at"] = Carbon::now();

    }

    public function setUpdatedAtAttributte($value){
     date_default_timezone_set("America/Mexico_City");
     $this->attributes["updated_at"] = Carbon::now();

    }

    public function courses(){
        return $this->hasMany(DiscountCourse::class);
    }
    public function categories(){
        return $this->hasMany(DiscountCategorie::class);
    }

    function scopeFilterAdvance($query,$state){
        if($state){
           $query->where("state",$state);
        }
        return $query;
    }
}