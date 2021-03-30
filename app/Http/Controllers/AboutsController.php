<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Usercontacts;
use App\abouts;
//images upload
use Illuminate\Http\UploadedFile;


class AboutsController extends Controller
{
    public function abouts()
    {
       return view('allcreate.abouts');
    }


    public function store(Request $data){
        $student = new abouts;
        $student->title=$data->title;
        $student->description=$data->description;

           $image=$data->file('images');
       //    print_r($data);

       //$category =  DB::insert("insert into categories (name, slug) values (?,?)", [
           //      'hasan','hasan@gmail.com'
           //  ]);


       //$category = DB::table('categories')->$data;
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
       return redirect('allcreate.abouts');


      }else{

        $student->save();
        return redirect('allcreate.abouts');
      }

       }

       public function view()
       {
           $user = abouts::all();

          // return response()->json($user);
         //  return view('students.allstudents', compact('user'));

          return view('allcreate.abouts', compact('user'));
       }

       public function edit($id)
       {
           //
           $user = abouts::all();
           $edit = abouts::findorfail($id);

           return view('allcreate.abouts', compact('edit', 'user'));

       }

       public function update(Request $data, $id)
       {
        $student = abouts::findorfail($id);;
        $student->title=$data->title;
        $student->description=$data->description;

           $image=$data->file('images');
       //    print_r($data);

       //$category =  DB::insert("insert into categories (name, slug) values (?,?)", [
           //      'hasan','hasan@gmail.com'
           //  ]);


       //$category = DB::table('categories')->$data;
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
       return redirect('allcreate.abouts');


      }else{

        $student->save();
        return redirect('allcreate.abouts');
      }

       }

       public function destroy($id)
    {
        //
        $user = abouts::findorfail($id);
        $user->delete();

        return redirect('allcreate.abouts');
    }
}
