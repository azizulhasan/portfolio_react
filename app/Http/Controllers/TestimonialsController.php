<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\testimonials;

//images upload
use Illuminate\Http\UploadedFile;

class TestimonialsController extends Controller
{
    public function testimonials()
    {
       return view('allcreate.testimonials');
    }


    public function store(Request $data){
    
         

           $student = new testimonials;
           $student->name=$data->name;
           $student->organization=$data->organization;
           $student->designation=$data->designation;
           $student->description=$data->description;
   
              $image=$data->file('images');
      
      // return response()->json($data);
      if($image){

            $image_name=hexdec(uniqid());
            $ext =strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/admin/images/';
            $image_url=$upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $student->images=$image_url;
            $student->save();
            return redirect('allcreate.testimonials');


      }else{
        $student->save();
        return redirect('allcreate.testimonials');
      }

       }

       public function view()
       {
           $user = testimonials::all();

          // return response()->json($user);
         //  return view('students.allstudents', compact('user'));

          return view('allcreate.testimonials', compact('user'));
       }
       public function edit($id)
       {
           //
           $user = testimonials::all();
           $edit = testimonials::findorfail($id);

           return view('allcreate.testimonials', compact('edit', 'user'));

       }

       public function update(Request $data, $id){
    
         

        $student = testimonials::findorfail($id);
        $student->name=$data->name;
        $student->organization=$data->organization;
        $student->designation=$data->designation;
        $student->description=$data->description;

           $image=$data->file('images');
   
   // return response()->json($data);
   if($image){

         $image_name=hexdec(uniqid());
         $ext =strtolower($image->getClientOriginalExtension());
         $image_full_name=$image_name.'.'.$ext;
         $upload_path='public/admin/images/';
         $image_url=$upload_path.$image_full_name;
         $success = $image->move($upload_path,$image_full_name);
         $student->images=$image_url;
         unlink($data->old_images);
         $student->save();
         return redirect('allcreate.testimonials');


   }else{
     $student->save();
     return redirect('allcreate.testimonials');
   }

    }
    public function destroy($id)
    {
        //
        $user = testimonials::findorfail($id);
        $user->delete();

        return redirect('allcreate.testimonials');
    }


}
