<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\portfolios;
//images upload
use Illuminate\Http\UploadedFile;

class PortfoliosController extends Controller
{
    public function portfolios()
    {
       return view('allcreate.portfolios');
    }


    public function store(Request $data){
        //   $data =array();
    
           $student = new portfolios;
           $student->title=$data->title;
           $student->website=$data->website;
           $student->filtername=$data->filtername;
           $image=$data->file('images');
           $hoverimages=$data->file('hoverimages');
            
    
      // return response()->json($data);
      if($image || $hoverimages){

        $image_name=hexdec(uniqid());
        $ext =strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/admin/images/';
        $image_url=$upload_path.$image_full_name;
        $success = $image->move($upload_path,$image_full_name);
        $student->images=$image_url;
        $student->save();
         //   return response()->json($data);
          
           // return redirect('allcreate.portfolios');
        if($hoverimages){
            $image_name=hexdec(uniqid());
            $ext =strtolower($hoverimages->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/admin/images/';
            $image_url=$upload_path.$image_full_name;
            $success = $hoverimages->move($upload_path,$image_full_name);
            $student->hoverimages=$image_url;
            $student->save();
               //return response()->json($data);
              
                return redirect('allcreate.portfolios');
        }


      }else{

        $student->save();
        return redirect('allcreate.portfolios');
      }

       }


       public function view()
       {
           $user = portfolios::all();

          // return response()->json($user);
         

          return view('allcreate.portfolios', compact('user'));
       }

       public function edit($id)
       {
           //
           $user = portfolios::all();
           $edit = portfolios::findorfail($id);

           return view('allcreate.portfolios', compact('edit', 'user'));

       }

       public function update(Request $data, $id){
        //   $data =array();
    
           $student = portfolios::findorfail($id);
           $student->title=$data->title;
           $student->website=$data->website;
           $student->filtername=$data->filtername;
           $image=$data->file('images');
           $hoverimages=$data->file('hoverimages');
            
    
      // return response()->json($data);
      if($image || $hoverimages){

        $image_name=hexdec(uniqid());
        $ext =strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/admin/images/';
        $image_url=$upload_path.$image_full_name;
        $success = $image->move($upload_path,$image_full_name);
        $student->images=$image_url;
        unlink($data->old_images);
        $student->save();
         //   return response()->json($data);
          
           // return redirect('allcreate.portfolios');
        if($hoverimages){
            $image_name=hexdec(uniqid());
            $ext =strtolower($hoverimages->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/admin/images/';
            $image_url=$upload_path.$image_full_name;
            $success = $hoverimages->move($upload_path,$image_full_name);
            $student->hoverimages=$image_url;
            unlink($data->old_hoverimages);
            $student->save();
               //return response()->json($data);
              
                return redirect('allcreate.portfolios');
        }


      }else{

        $student->save();
        return redirect('allcreate.portfolios');
      }

       }
       public function destroy($id)
       {
           //
           $user = portfolios::findorfail($id);
           $user->delete();
   
           return redirect('allcreate.portfolios');
       }



}
