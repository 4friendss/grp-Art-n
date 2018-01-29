<?php
/**
 * Created by PhpStorm.
 * User: Artan
 * Date: 11/29/2017
 * Time: 8:26 AM
 */

namespace App\Http\SelfClasses;

use App\Models\Category;
use App\Models\CategoryProject;
use App\Models\Project;
use App\Models\ProjectColor;
use App\Models\ProjectFlag;
use App\Models\ProjectImage;
use App\Models\ProjectSize;
use App\Models\SubUnitCount;
use App\Models\UnitCount;
use Hekmatinasser\Verta\Verta;

class UpdateProject
{
    public function UpdateProject($Project)
    {
        //upload Project's video
        $videoSrc = '';
        if (!empty($Project->video_src)) {
            $file = $Project->video_src;
            $videoSrc = $file->getClientOriginalName();
            $file->move('public/dashboard/upload_files/projects/video/', $videoSrc);
        }

        //update Project in Project table
        $pr = Project::find($Project->id);
        if (!empty($Project->title)) {
            $pr->title = $Project->title;
        }
        if (!empty($Project->description)) {
            $pr->description = $Project->description;
        }
        if (!empty($videoSrc)) {
            $pr->video_src = $videoSrc;
        }
        if (!empty($Project->lastCategory)) {
            $pr->project_type_id = $Project->lastCategory;
        }
        $pr->save();
        $lastProjectId = $pr->id;//or $lastProjectId=$Project->id;
        //$lastProjectId for use in pivot table
        //this block code save color array of Project in color_Project table


        //this block code save and upload picture array of Project in Project_Images table
        $countPic = count($Project->file);
        if ($countPic) {
            for ($i = 0; $i < $countPic; $i++) {
                $ProjectPicture = new ProjectImage();
                $ProjectPicture->Project_id = $lastProjectId;
                $ProjectPicture->title= $Project->title;;
                $imageExtension = $Project->file[$i]->getClientOriginalExtension();
                $imageName=microtime();
                $ProjectPicture->src = $imageName.'.'.$imageExtension;
                $Project->file[$i]->move('public/dashboard/upload_files/projects/', $imageName.'.'.$imageExtension);
                $ProjectPicture->active = 1;
                $ProjectPicture->save();
            }
        }
        return (true);
    }
}