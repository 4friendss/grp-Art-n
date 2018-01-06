<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\News;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\ProjectType;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.adminLayout');
    }
    public function home()
    {
        $product_type_id=ProjectType::where('title','=','محصول')->value('id');
        $works_type_id=ProjectType::where('title','=','نمونه کار')->value('id');
        $projects_products = Project::where('project_type_id','=',$product_type_id)->get();
        $projects_works = Project::where('project_type_id','=',$works_type_id)->get();
        $user=User::where('active','1')->get();
        $internship=Internship::where('active','1')->get();
        $news=News::where('active','1')->get();

        return view('index',compact('user','internship','news','projects_products','projects_works'));
    }
    //load news title with json
    public function news()
    {
        $news=News::where('active','1')->value('title');
        return response()->json($news);
    }


}
