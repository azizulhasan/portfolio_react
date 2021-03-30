<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Students;
use App\Skills;
//images upload
use Illuminate\Http\UploadedFile;

class SkillsController extends Controller
{
    public function skills()
    {
       return view('allcreate.skills');
    }
    public function store(Request $data){
        
           $student = new Skills;
           $student->title=$data->title;
           $student->percentege=$data->percentege;
           $student->description=$data->description;
   
              $image=$data->file('images');
       //return response()->json($data);
      if($image){

            $image_name=hexdec(uniqid());
            $ext =strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/admin/skills/';
            $image_url=$upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $student->images=$image_url;
           $student->save();
       return redirect('allcreate.skills');


      }else{
        $student->save();
        return redirect('allcreate.skills');
      }

       }

       public function view()
       {
           $user = Skills::all();

          // return response()->json($user);


          return view('allcreate.skills', compact('user'));
         // return view('/', compact('user'));
       }

       public function edit($id)
       {
           //
           $user = Skills::all();
           $edit = Skills::findorfail($id);

           return view('allcreate.Skills', compact('edit', 'user'));

       }

       public function update(Request $data, $id){
        
        $student = Skills::findorfail($id);
        $student->title=$data->title;
        $student->percentege=$data->percentege;
        $student->description=$data->description;

           $image=$data->file('images');
    //return response()->json($data);
   if($image){

         $image_name=hexdec(uniqid());
         $ext =strtolower($image->getClientOriginalExtension());
         $image_full_name=$image_name.'.'.$ext;
         $upload_path='public/admin/skills/';
         $image_url=$upload_path.$image_full_name;
         $success = $image->move($upload_path,$image_full_name);
         $student->images=$image_url;
         unlink($data->old_images);
         $student->save();
    return redirect('allcreate.skills');


   }else{
     $student->save();
     return redirect('allcreate.skills');
   }

    }
    public function destroy($id)
    {
        //
        $user = Skills::findorfail($id);
        $user->delete();

        return redirect('allcreate.skills');
    }


}
