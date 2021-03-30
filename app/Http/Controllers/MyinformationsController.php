<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\myinformations;

//images upload
use Illuminate\Http\UploadedFile;

class MyinformationsController extends Controller
{
    public function myinformations()
    {
       return view('allcreate.myinformations');
    }


    public function store(Request $data)
    {


       // return response()->json($data);

        $student = new myinformations;
        $student->name=$data->name;
        $student->father=$data->father;
        $student->mother=$data->mother;
        $student->email=$data->email;
        $student->phone=$data->phone;
        $student->birth=$data->birth;
        $student->present=$data->present;
        $student->permanet=$data->permanet;
        $student->nationality=$data->nationality;
        $student->married=$data->married;
        $student->designation=$data->designation;
        $student->blood=$data->blood;
        $student->gender=$data->gender;
        $student->description=$data->description;
        $image=$data->file('image');


        if($image){

            $image_name=hexdec(uniqid());
            $ext =strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/admin/images/';
            $image_url=$upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $student->image=$image_url;
            $student->save();

       return redirect('allcreate.myinformations');


      }else{

        $student->save();
        return redirect('allcreate.myinformations');
      }


    }
    public function view()
    {
        $user = myinformations::all();

       // return response()->json($user);
      //  return view('students.allstudents', compact('user'));

       return view('allcreate.myinformations', compact('user'));
    }
    public function edit($id)
    {
        //
        $user = myinformations::all();
        $edit = myinformations::findorfail($id);

        //return print_r($edit);
       return view('allcreate.myinformations', compact('edit', 'user'));

    }
    public function update(Request $data, $id)
    {


       // return response()->json($data);

        $student = myinformations::findorfail($id);
        $student->name=$data->name;
        $student->father=$data->father;
        $student->mother=$data->mother;
        $student->email=$data->email;
        $student->phone=$data->phone;
        $student->birth=$data->birth;
        $student->present=$data->present;
        $student->permanet=$data->permanet;
        $student->nationality=$data->nationality;
        $student->married=$data->married;
        $student->designation=$data->designation;
        $student->blood=$data->blood;
        $student->gender=$data->gender;
        $student->description=$data->description;
        $image=$data->file('image');


        if($image){

            $image_name=hexdec(uniqid());
            $ext =strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/admin/images/';
            $image_url=$upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $student->image=$image_url;         
            unlink($data->old_images);
            $student->save();

       return redirect('allcreate.myinformations');


      }else{

        $student->save();
        return redirect('allcreate.myinformations');
      }


    }

    public function destroy($id)
    {
        //
        $user = myinformations::findorfail($id);
        $user->delete();

        return redirect('allcreate.myinformations');
    }
}
