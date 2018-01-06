<?php
/**
 * Created by PhpStorm.
 * User: Artan
 * Date: 11/30/2017
 * Time: 9:33 AM
 */

namespace App\Http\SelfClasses;

use Illuminate\Support\Facades\Validator;

class CheckProject
{
    public function ProjectValidate($request)
    {
        //validation for Projects when adding a Project
        $validation=Validator::make($request->all(),[

            'projectType' => 'required|numeric',
            'title' => 'required|max:255',
            'description' => 'required',
            'video_src' => 'sometimes|nullable|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4|max:4096',
//            'file' => 'required|image|max:200',
        ],
            [
                'projectType.required'=>'فیلد نوع پروژه الزامی است',
                'title.required'=>'فیلد عنوان الزامی است',
                'description.required'=>'فیلد توضیحات الزامی است',
                'video_src.mimetypes'=>'فرمت ویدئوی انتخاب شده اشتباه است ',
//                'file.image'=>'فرمت تصویر یا تصاویر انتخاب شده اشتباه است ',
//                'file.required'=>' تصویر الزامی است ',
//                'file.size'=>' تصویر یا تصاویر منتخب نباید از 200 کیلوبایت بیشتر باشند ',
            ]);
        $errors = $validation->errors();
        if(!$errors->isEmpty())
            return $errors;
        else
            return "true";
    }
}