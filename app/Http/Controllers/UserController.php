<?php

namespace App\Http\Controllers;

use App\Http\SelfClasses\AddNewInternshipImage;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //show user create form
    public function usersCreate()
    {
        $pageTitle = 'درج کارمند جدید';
        return view('admin.usersCreate', compact('pageTitle'));
    }
    //show user create form
    public function usersManagement()
    {
        $pageTitle = 'مدیریت کارمندان';
        $data=User::all();
        return view('admin.usersManagement', compact('pageTitle','data'));
    }
    public function changeUserStatus(Request $request , $id)
    {
        $userId = $request->userId;
        switch ($id)
        {
            case 1:
                $deactive = User::where('id', $userId)->update(['active' => 0]);
                if($deactive)
                {
                    return response()->json( 'کاربر مورد نظر شما غیر فعال گردید');
                }
                break;
            case 2:
                $active = User::where('id', $userId)->update(['active' => 1]);
                if($active)
                {
                    return response()->json( 'کاربر مورد نظر شما  فعال گردید');
                }
                break;
        }
        $data=User::all();
        return view('admin.usersManagement', compact('pageTitle','data'));
    }

    //rayat//create user
    public function usersCreatePost(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required|max:100',
                'name' => 'required|max:255',
                'family' => 'required|max:255',
                'description' => 'required|max:500',
                'email' => 'required|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'pic' => 'required|image',
                'resume' => 'max:600000|mimetypes:application/pdf',
            ]
            ,
            [
                'title.required' => ' فیلد عنوان الزامی است',
                'title.max' => 'حداکثر 255 کاراکتر مجاز است',
                'name.required' => ' فیلد نام الزامی است',
                'name.max' => 'حداکثر 255 کاراکتر مجاز است',
                'description.required' => ' فیلد سمت/توضیحات الزامی است ',
                'family.required' => ' فیلد نام خانوادگی الزامی است ',
                'family.max' => 'حداکثر 255 کاراکتر مجاز است',
                'email.required' => ' فیلد ایمیل الزامی است',
                'email.email' => ' فرمت ایمیل نادرست است ',
                'password.required' => ' فیلد رمز عبور الزامی است ',
                'password.min' => ' رمز عبور حداقل باید 6 کاراکتر باشد ',
                'password.confirmed' => ' رمز عبور و تکرار آن با هم مطابقت ندارند ',
                'pic.required' => ' انتخاب تصویر پروفایل الزامی است ',
                'pic.image' => '  فرمت تصویر پروفایل صحیح نیست ',
                'resume.mimetypes' => '  فرمت رزومه صحیح نیست ',
            ]);
        $user = new User();
        $pictureName=$request->email.substr($request->pic->getClientOriginalName(),-4);
        if(!empty($request->resume))
        {
            $resumeName=$request->email.substr($request->resume->getClientOriginalName(),-4);
            $request->resume->move('public/dashboard/upload_files/team_resume',$resumeName);
            $user->resume_src = $resumeName;
        }
        $request->pic->move('public/dashboard/upload_files/team',$pictureName);;
        $user->title = $request->title;
        $user->name = $request->name;
        $user->family = $request->family;
        $user->description = $request->description;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->src =$pictureName;
        $user->active = '1';
        $res = $user->save();
        if($res==true)
        return response()->json('کارمند جدید با موفقیت ثبت شد');
    }

}
