<?php

namespace App\Http\Controllers\Admin\Course;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Course\Course;
use App\Models\Course\Categorie;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Course\CourseGResource;
use App\Http\Resources\Course\CourseGCollection;

class CourseGController extends Controller
{
      /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $state = $request->state;
      
        $courses = Course::orderBy("id","desc")->get();

        return response()->json([
            "courses" => CourseGCollection::make($courses),
         /*   "courses" => $courses->map(function($categorie){
                return [
                    "name"=>$categorie->name,
                    "surname"=>$categorie->surname,
                    "email"=>$categorie->email,
                    "role"=>$categorie->role,
                    "avatar"=>env("APP_URL")."storage/". $categorie->avatar,


                ];
            }),*/
        ]);
    }

    public function config(){

        $categories = Categorie::where("categorie_id", NULL)->orderBy("id","desc")->get();
        $subcategories = Categorie::where("categorie_id","<>", NULL)->orderBy("id","desc")->get();
        $instructores = User::where("is_instructor",1)->orderBy("id","desc")->get();

        return response()->json([
            "categories" => $categories,
            "subcategories" => $subcategories,
            "instructores" => $instructores->map(function($user){
                return [
                   "id" => $user->id,
                   "full_name"=> $user->name.' '. $user->surname,
                ];
            }),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $is_exist = Course::where("title",$request->title)->first();
        if($is_exist){
          return response()->json(["message" => 403, "message_text" => "YA EXISTE UN CURSO CON ESTE TITULO"]);
        }
        if($request ->hasFile('portada')){
           $path = Storage::putFile("courses",$request->file("portada"));
           $request->request->add(["imagen" => $path]); 
        }
        $request->request->add(["slug" => Str::slug($request->title)]);
          $request->request->add(["requirements" => json_encode(explode(",",$request->requirements))]);
        $request->request->add(["who_is_it_for" => json_encode(explode(",",$request->who_is_it_for))]);
     
        $course = Course::create($request -> all());

     return response()->json(["message"=> 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return response()->json(
            [
                "course" => CourseGResource::make($course)
            ]
            );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    

        $is_exist = Course::where("id","<>", $id)->where("title",$request->title)->first();
        if($is_exist){
          return response()->json(["message" => 403, "message_text" => "YA EXISTE UN CURSO CON ESTE TITULO"]);
        }
        $course = Course::findOrFail($id);
        if($request ->hasFile('portada')){
            if($course->imagen){
                Storage::delete($course->imagen);
            }
            $path = Storage::putFile("courses",$request->file("portada"));
            $request->request->add(["imagen" => $path]); 
         }
         $request->request->add(["slug" => Str::slug($request->title)]);
         $request->request->add(["requirements" => json_encode(explode(",",$request->requirements))]);
         $request->request->add(["who_is_it_for" => json_encode(explode(",",$request->who_is_it_for))]);
       $course->update($request->all());
       return response()->json(["course" => CourseGResource::make($course)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return response()->json(["message" => 200]);
    }

}