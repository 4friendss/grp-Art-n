<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\RegisterForm;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    //rayat//create registerForm
    public function registerInternship(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|max:50',
                'email' => 'required|max:255|email',
                'gender' => 'required|max:4',
                'tel' => 'required|max:11',
                'age' => 'required|numeric',
                'education' => 'required|max:50',
                'expert' => 'required',
            ]
            ,
            [
                'expert.required' => ' لطفا یکی از تخصص ها را انتخاب نمائید',
                'name.required' => ' فیلد نام و نام خانوادگی الزامی است',
                'name.max' => 'فیلد نام و نام خانوادگی حداکثر 50 کاراکتر مجاز است',
                'email.required' => ' فیلد ایمیل الزامی است',
                'email.email' => ' فرمت ایمیل نادرست است ',
                'gender.required' => ' فیلد رمز عبور الزامی است ',
                'gender.max' => ' فیلد جنسیت حداکثر باید 4 کاراکتر باشد ',
                'age.required' => ' فیلد سن الزامی است ',
                'age.numeric' => ' فیلد سن باید عددی باشد ',
                'tel.required' => ' فیلد تلفن الزامی است ',
                'tel.max' => ' فیلد تلفن حداکثر می تواند 11 کاراکتر باشد ',
                'education.required' => ' فیلد تحصیلات الزامی است ',
                'education.max' => '  فیلد تحصیلات حد اکثر می تواند 50 کاراکتر باشد',
            ]);
        $user = new RegisterForm();
        $user->full_name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->education = $request->education;
        $user->expert = $request->expert;
        $user->tel = $request->tel;
        $res = $user->save();
        if($res==true)
            return response()->json('فرم شما با موفقیت ثبت شد');
    }
}
