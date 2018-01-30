<?php

namespace App\Http\Controllers;

use App\Http\SelfClasses\AddProject;
use App\Http\SelfClasses\CheckFiles;
use App\Http\SelfClasses\CheckProject;
use App\Http\SelfClasses\CheckUpdateProject;
use App\Http\SelfClasses\UpdateProject;
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
    public function projectDetails($id)
    {
        $pageTitle = 'ویرایش پروژه';
        $products = Project::where([['id', $id], ['active', 1]])->get();
        if (count($products) > 0) {
            return view('admin.projectDetails', compact('products', 'pageTitle'));
        } else {
            return view('errors.403');
        }
    }

    //delete project picture from '/dashboard/upload_files/projects/' and from project_image table
    // call this me by ajax from projectDetails for updating and change projects picture
    public function deleteProjectPicture($id)
    {
        $ImageName = ProjectImage::where('id', '=', $id)->value('src');
        $srcImage = '/dashboard/upload_files/projects/' . $ImageName;
        $res=unlink(public_path().$srcImage);
        $res1 = ProjectImage::destroy($id);
        if ($res1 == 1 && $res == 1)
            return response()->json(['message'=>'success']);
    }
    //delete project video from '/dashboard/upload_files/projects/video' and from project.video_src field
    // call this me by ajax from projectDetails for updating and change projects video
    public function deleteVideo($id)
    {
        $video = Project::where('id', '=', $id)->value('video_src');
        $srcImage = '/dashboard/upload_files/projects/video/' . $video;
        $res=unlink(public_path().$srcImage);
        $update = Project::find($id);
        $update->video_src = null;
        $res1=$update->save();

        if ($res1 == 1 && $res == 1)
            return response()->json(['message'=>'success']);
    }
    //update Project to database
    public function updateProject(Request $request)
    {

            $checkProject = new CheckUpdateProject();
            $result = $checkProject->ProjectValidate($request);
            if ($result == "true") {
                $checkFiles = new CheckFiles();
                $result = $checkFiles->checkCategoryFiles($request);
                if (is_bool($result)) {
                    $UpdateProject = new UpdateProject();
                    $ans = $UpdateProject->UpdateProject($request);
                    if ($ans == "true")
                        return response()->json(['data' => 'ویرایش محصول شما با مؤفقیت انجام شد']);
                    else
                        return response()->json(['data' => 'خطایی رخ داده است، -لطفا با بخش پشتیبانی تماس بگیرید.', 'ans' => $ans]);
                } else
                    return response()->json(['message' => $result, 'code' => '1']);
            } else {
                return response()->json($result);
            }
    }
}
