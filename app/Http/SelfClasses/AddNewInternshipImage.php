<?php
/**
 * Created by PhpStorm.
 * User: Artan
 * Date: 1/23/2018
 * Time: 3:11 PM
 */

namespace App\Http\SelfClasses;
use App\Models\Internship;

class AddNewInternshipImage
{
   public function addNewImage($request)
   {
       $count = count($request->file);
       $i     = 0;
       while($i < $count)
       {
           $image = new Internship();
           $file = $request->file[$i];
           $src  = $file->getClientOriginalName();
           $file->move('public/dashboard/upload_files/internship', $src);
           $image->src = $src;
           $image->title= trim($request->title[$i]);
           $image->save();
           $i++;
       }if($image)
       {
           return true;
       }else
           {
               return('خطایی رخ داده است ، لطفا بخش پشتباتی تماس بگیرید');
           }
   }
}