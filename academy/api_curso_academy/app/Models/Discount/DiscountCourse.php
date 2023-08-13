<?php

namespace App\Models\Discount;

use App\Models\Course\Course;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DiscountCourse extends Model
{
    use HasFactory;

    protected $fillable = [
       "discount_id",
       "course_id",
        
    ];



       public function setCreatedAtAttributte($value){
     date_default_timezone_set("America/Mexico_City");
     $this->attributes["created_at"] = Carbon::now();

    }

    public function setUpdatedAtAttributte($value){
     date_default_timezone_set("America/Mexico_City");
     $this->attributes["updated_at"] = Carbon::now();

    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}