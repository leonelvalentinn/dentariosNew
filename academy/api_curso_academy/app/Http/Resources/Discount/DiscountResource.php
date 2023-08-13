<?php

namespace App\Http\Resources\Discount;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
          "id" => $this->resource->id,
          "code" => $this->resource->code,
          "type_discount" => $this->resource->type_discount,
          "discount" => $this->resource->discount,
          "start_date" => Carbon::parse($this->resource->start_date)->format("Y-m-d"),
          "end_date" => Carbon::parse($this->resource->end_date)->format("Y-m-d"),
          "discount_type"=> $this->resource->discount_type,
          "type_campaing" => $this->resource-> type_campaing,
          "state"=> $this->resource->state,
          "course"=> $this->resource->courses->map(function($course_aux){
                 return [
                   "id" => $course_aux->course_id,
                   "title"=> $course_aux->title,
                   "imagen"=> env("APP_URL")."storage/".$course_aux->course->imagen,
                   "aux_id"=> $course_aux->id,
                 ];
          }),
           "categories"=> $this->resource->categories->map(function($categorie_axu){
                 return [
                   "id" => $categorie_axu->categorie_id,
                   "name"=> $categorie_axu->categorie->name,
                   "imagen"=> env("APP_URL")."storage/".$categorie_axu->categorie->imagen,
                   "aux_id"=> $categorie_axu->id,
                 ];
          }),
        ];
        
    }
}