<?php

namespace App\Http\Controllers;

use App\Http\SelfClasses\AddNewInternshipImage;
use App\Http\SelfClasses\CheckFiles;
use App\Models\Internship;
use App\Models\RegisterForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;

class InternshipController extends Controller
{
    //rayat//create registerForm
    public function registerInternship(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|max:50',
                'email' => 'required|max:255|email|unique:users',
                'gender' => 'required|max:4',
                'tel' => 'required|numeric|min:8',
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
                'email.unique' => ' این ایمیل قبلا ثبت شده است ',
                'gender.required' => ' فیلد رمز عبور الزامی است ',
                'gender.max' => ' فیلد جنسیت حداکثر باید 4 کاراکتر باشد ',
                'age.required' => ' فیلد سن الزامی است ',
                'age.numeric' => ' فیلد سن باید عددی باشد ',
                'tel.numeric' => ' فیلد تلفن باید عددی باشد ',
                'tel.required' => ' فیلد تلفن الزامی است ',
                'tel.max' => ' فیلد تلفن حداکثر می تواند 11 کاراکتر باشد ',
                'tel.min' => ' فیلد تلفن حداقل می تواند 8 کاراکتر باشد ',
                'education.required' => ' فیلد تحصیلات الزامی است ',
                'education.max' => ' فیلد تحصیلات حد اکثر می تواند 50 کاراکتر باشد',
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
    public function addInternshipImage()
    {
        $pageTitle = 'افزودن  تصاویر کارآموزی';
        return view('admin.addInternshipImage', compact('pageTitle'));
    }
    //below function is related to add sliders photo
    public function addInternshipImagePost(Request $request)
    {
        $checkFiles = new CheckFiles();
        $result = $checkFiles->checkCategoryFiles($request);
        if (is_bool($result)) {
            $addNewSlide = new AddNewInternshipImage();
            $result1 = $addNewSlide->addNewImage($request);
            if (is_bool($result1)) {
                return response()->json(['message' => 'اطاعات شما با موفقیت ثبت گردید', 'code' => 'success']);
            } else {
                return response()->json(['message' => $result1, 'code' => 'error']);
            }
        } else {
            return response()->json(['message' => $result, 'code' => 'error']);
        }
    }
    //below function is related to return slider management view
    public function internshipImageManagement()
    {
        $pageTitle = 'مدیریت تصاویر کارآموزی';
        $images = Internship::all();
        return view('admin.internshipImageManagement', compact('pageTitle', 'images'));
    }

    //below function is related to return edit internship image view
    public function editInternship($id)
    {
        $pageTitle = 'ویرایش اسلایدر';
        $image = Internship::find($id);
        return view('admin.editInternship', compact('pageTitle', 'image'));
    }


    //below function is related to edit internship picture
    public function editInternshipPicture(Request $request)
    {
        $checkFiles = new CheckFiles();
        $result = $checkFiles->checkCategoryFiles($request);
        if (is_bool($result)) {
            $slider = Internship::find($request->sliderId);
            $file = $request->file[0];
            $src = $file->getClientOriginalName();
            $file->move('public/dashboard/upload_files/internship/', $src);
            $slider->src = $request->file[0]->getClientOriginalName();
            $slider->save();
            if ($slider) {
                return response()->json('ویرایش با موفقیت انجام گردید');
            }
        } else {
            return response()->json(['message' => $result, 'code' => '1']);
        }
    }

    //below function is related to edit internship image title
    public function editInternshipTitle(Request $request)
    {
        $slider = Internship::find($request->id);
        $slider->title = trim($request->title);
        $slider->save();
        if ($slider) {
            return response()->json(['message' => 'ویرایش با موفقیت انجام گردید', 'code' => 1]);
        } else {
            return response()->json(['message' => 'خطایی در عملیات ویرایش رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
        }
    }

    //below function is related to make internship image enable or disable
    public function enableOrDisableInternship(Request $request)
    {
        if (!$request->ajax()) {
            abort(403);
        } else {
            switch ($request->active) {
                case 1 :
                    $update = DB::table('internships')->where('id', $request->sliderId)->update(['active' => 0]);
                    if ($update) {
                        return response()->json(['message' => 'تصویر مورد نظر شما غیر فعال گردید', 'code' => '1']);
                    } else {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;

                case 0 :
                    $update = DB::table('internships')->where('id', $request->sliderId)->update(['active' => 1]);
                    if ($update) {
                        return response()->json(['message' => 'تصویر مورد نظر شما  فعال گردید', 'code' => '1']);
                    } else {
                        return response()->json(['message' => 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید']);
                    }
                    break;

            }
        }
    }
}
