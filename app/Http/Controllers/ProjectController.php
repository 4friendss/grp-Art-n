<?php

namespace App\Http\Controllers;

use App\Http\SelfClasses\AddProject;
use App\Http\SelfClasses\CheckFiles;
use App\Http\SelfClasses\CheckProject;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\ProjectType;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function loadProjects()
    {
        $projects = ProjectImage::all();
        return response()->json($projects);
    }

    public function projectDetail($id)
    {
        $project = Project::where('id', $id)->get();
        $projectTitle = 'همه ی محصولات';
        $projects = Project::all();
//        dd($projects[0]->productImage->src);
//        dd($project->projectImage->src);
        return view('projectDetail', compact('projects', 'project', 'projectTitle', 'user'));
    }
    public function projectManagement()
    {
        $pageTitle = 'مدیریت محصولات';
        $data = Project::all();
        return view('admin.projectManagement', compact('data', 'pageTitle'));
    }

    public function projectCreate()
    {
        return view('admin.projectCreate');
    }
    public function projectType()
    {
        $projectType=ProjectType::all();
        return response()->json($projectType);
    }

    public function projectCreatePost(Request $request)
    {
        $checkProject = new CheckProject();
        $result = $checkProject->ProjectValidate($request);
        if ($result == "true") {
            $checkFiles = new CheckFiles();
            $result = $checkFiles->checkCategoryFiles($request);
            if (is_bool($result)) {
                $addNewProject = new AddProject();
                $ans = $addNewProject->addproject($request);
                if ($ans == "true")
                    return response()->json(['data' => 'محصول شما با مؤفقیت درج شد']);
                else
                    return response()->json(['data' => 'خطایی رخ داده است، -لطفا با بخش پشتیبانی تماس بگیرید.']);
            } else
                return response()->json(['message' => $result, 'code' => '1']);
        } else {
            return response()->json($result);
        }
    }
}
