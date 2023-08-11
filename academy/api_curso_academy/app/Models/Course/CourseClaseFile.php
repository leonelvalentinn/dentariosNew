<?php

namespace App\Models\Course;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseClaseFile extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        "course_clase_id",
        "name_file",
        "size",
        "time",
        "resolution",
        "file",
        "type",

    ];

    public function setCreatedAtAttributte($value){
     date_default_timezone_set("America/Mexico_City");
     $this->attributes["created_at"] = Carbon::now();

    }

    public function setUpdatedAtAttributte($value){
     date_default_timezone_set("America/Mexico_City");
     $this->attributes["updated_at"] = Carbon::now();

    }
    
}