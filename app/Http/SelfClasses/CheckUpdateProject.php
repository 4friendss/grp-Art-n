<?php
/**
 * Created by PhpStorm.
 * User: Artan
 * Date: 11/30/2017
 * Time: 9:33 AM
 */

namespace App\Http\SelfClasses;

use Illuminate\Support\Facades\Validator;

class CheckUpdateProject
{
    public function ProjectValidate($request)
    {
        $validation=Validator::make($request->all(),[

            'categories' => 'sometimes|nullable|numeric',
            'title' => 'sometimes|nullable||max:255',
            'description' => 'sometimes|nullable|',
            'video_src' => 'sometimes|nullable|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4|max:4096',
            'pic[]' => 'sometimes|nullable|image|max:2',
        ],
            [
                'categories.numeric'=>'فیلد دسته بندی را دستکاری نفرمائید',
                'categories.required'=>'فیلد دسته بندی الزامی است',
                'title.required'=>'فیلد عنوان الزامی است',
                'description.required'=>'فیلد توضیحات الزامی است',
                'video_src.mimetypes'=>'فرمت ویدئوی انتخاب شده اشتباه است ',
                'pic[].image'=>'فرمت تصویر یا تصاویر انتخاب شده اشتباه است ',
            ]);
        $errors = $validation->errors();
        if(!$errors->isEmpty())
            return $errors;
        else
            return "true";
    }
}