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
        function updateCategoryProject($pId, $cateId)
        {
            $ProjectId = CategoryProject::where('Project_id', '=', $pId)->value('id');
            $ProjectCategory = CategoryProject::find($ProjectId);
            $ProjectCategory->category_id = $cateId;
            $ProjectCategory->save();
        }
        //add a flags with flag's price in Project flags
        function updateProjectFlag($title, $price, $lastProjectId)
        {
            $ProjectId = ProjectFlag::where('Project_id', '=', $lastProjectId)->where('title','=',$title)->value('id');
            $prices = ProjectFlag::find($ProjectId);
            $prices->price = str_replace(',', '', $price);
            $prices->save();
        }
        //upload Project's video
        $videoSrc = '';
        if (!empty($Project->video_src)) {
            $file = $Project->video_src;
            $videoSrc = $file->getClientOriginalName();
            $file->move('public/dashboard/ProjectFiles/video/', $videoSrc);
        }
        $unit_count = UnitCount::where('id', '=', $Project->unit_count)->value('title');
        $sub_unit_count = SubUnitCount::where('id', '=', $Project->sub_unit_count)->value('title');
        //add a new Project in Project table
        $pr = Project::find($Project->id);
        if (!empty($Project->title)) {
            $pr->title = $Project->title;
        }
        if (!empty($Project->description)) {
            $pr->description = $Project->description;
        }
        if (!empty($Project->discount)) {
            $pr->discount = $Project->discount;
        }
        if (!empty($Project->produce_date)) {
            $pr->produce_date = $this->dateConvert($Project->produce_date);
        }
        if (!empty($Project->expire_date)) {
            $pr->expire_date = $this->dateConvert($Project->expire_date);
        }
        if (!empty($Project->produce_place)) {
            $pr->produce_place = $Project->produce_place;
        }
        if (!empty($unit_count)) {
            $pr->unit_count = $unit_count;
        }
        if (!empty($sub_unit_count)) {
            $pr->sub_unit_count = $sub_unit_count;
        }
        if (!empty($Project->ready_time)) {
            $pr->ready_time = $Project->ready_time;
        }
        if (!empty($videoSrc)) {
            $pr->video_src = $videoSrc;
        }
        if (!empty($Project->ready_time)) {
            $pr->delivery_volume = $Project->delivery_volume;
        }
        if (!empty($Project->ready_time)) {
            $pr->warehouse_count = $Project->warehouse_count;
        }
        if (!empty($Project->ready_time)) {
            $pr->warehouse_place = $Project->warehouse_place;
        }
        if (!empty($Project->ready_time)) {
            $pr->barcode = $Project->barcode;
        }
        $pr->save();
        $lastProjectId = $pr->id;//or $lastProjectId=$Project->id;
        //$lastProjectId for use in pivot table
        //this block code save color array of Project in color_Project table
        $countColor = count($Project->color);
        //by below block code and  instructions ,if new color sent old color deleted and new color insert in ProjectColor table
        if ($countColor > 0) {
            $deleteColors = ProjectColor::where('Project_id', '=', $lastProjectId)->get();
            foreach ($deleteColors as $delColor) {
                ProjectColor::destroy($delColor->id);
            }
            for ($i = 0; $i < $countColor; $i++) {
                $ProjectColor = new ProjectColor();
                $ProjectColor->Project_id = $lastProjectId;
                $ProjectColor->color_id = $Project->color[$i];
                $ProjectColor->active = 1;
                $ProjectColor->save();
            }
        }
        //this block code save size array of Project in Project_size table
        $countSize = count($Project->size);
        //by below block code and  instructions ,if new size sent old color deleted and new color insert in ProjectSize table
        if ($countColor > 0) {
            $deleteColors = ProjectSize::where('Project_id', '=', $lastProjectId)->get();
            foreach ($deleteColors as $delColor) {
                ProjectSize::destroy($delColor->id);
            }
            for ($i = 0; $i < $countSize; $i++) {
                $ProjectColor = new ProjectSize();
                $ProjectColor->Project_id = $lastProjectId;
                $ProjectColor->size_id = $Project->size[$i];
                $ProjectColor->active = 1;
                $ProjectColor->save();
            }
        }

        //this block code save and upload picture array of Project in Project_Images table
        $countPic = count($Project->file);
        if ($countPic>0) {
            for ($i = 0; $i < $countPic; $i++) {
                $ProjectPicture = new ProjectImage();
                $ProjectPicture->Project_id = $lastProjectId;
                $imageExtension = $Project->file[$i]->getClientOriginalExtension();
                $imageName=microtime();
                $ProjectPicture->image_src = $imageName.'.'.$imageExtension;
                $Project->file[$i]->move('public/dashboard/ProjectFiles/picture/', $imageName.'.'.$imageExtension);
                $ProjectPicture->active = 1;
                $ProjectPicture->save();
            }
        }
        if(!empty($Project->activePrice))
        {
            //if new active price was sent old row active must be 0 and new active price field active 1
            ProjectFlag::where('Project_id','=',$lastProjectId)
                ->where('title','=',$Project->activePrice)->update(['active'=>'1']);
            ProjectFlag::where('Project_id','=',$lastProjectId)
                ->where('title','<>',$Project->activePrice)->where('active','=','1')
                ->update(['active'=>'0']);
        }
        /**this block code save flags and prices of Project in Project_flags table
         * by calling updateProjectFlag(title of flag, price of flag, Project_id) **/
        if (!empty($Project->price)) {
            updateProjectFlag('price', $Project->price, $lastProjectId);
        }
        if (!empty($Project->special_price)) {
            updateProjectFlag('special_price', $Project->special_price, $lastProjectId);
        }
        if (!empty($Project->wholesale_price)) {
            updateProjectFlag('wholesale_price', $Project->wholesale_price, $lastProjectId);
        }
        if (!empty($Project->sales_price)) {
            updateProjectFlag('sales_price', $Project->sales_price, $lastProjectId);
        }
        if (!empty($Project->free_price)) {
            updateProjectFlag('free_price', $Project->free_price, $lastProjectId);
        }
        /**this section check user select which level of categories
         *and insert row to category_Project table with latest Project_id and category_id
         **/
        //update category_id if it was changed in edit form
        if (!empty($Project->lastCategory)) {
            $catId = $Project->lastCategory;
            //find category_id with 'سایر' title
            $depth = Category::where([['parent_id', $catId], ['active', 1]])->value('depth');
            if ($depth != 0) {
                $subCatId = Category::where([['parent_id', $catId], ['active', 1]])->
                where('title', '=', 'سایر')->value('id');
            } else {
                $subCatId = $catId;
            }
            updateCategoryProject($lastProjectId, $subCatId);
        }
        return (true);
    }
//below function is related to convert jalali date to Miladi date
    function dateConvert($jalaliDate)
    {
        if (count($jalaliDate) > 0) {
            if ($date = explode('/', $jalaliDate)) {
                $year = $date[0];
                $month = $date[1];
                $day = $date[2];
            }
            $gDate = $this->jalaliToGregorian($year, $month, $day);
            $gDate = $gDate[0] . '-' . $gDate[1] . '-' . $gDate[2];
            return $gDate;
        }
        return;
    }
    public function jalaliToGregorian($year, $month, $day)
    {
        return Verta::getGregorian($year, $month, $day);
    }
}