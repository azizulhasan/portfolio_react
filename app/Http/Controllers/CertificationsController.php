<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\certifications;
use App\User;
//images upload
use Illuminate\Http\UploadedFile;


class CertificationsController extends Controller
{
    public function certifications(){

        return view('allcreate.certifications');

       }
       public function store(Request $data)
       {

      //  return "ok";
   // return response()->json($data);
           $student = new certifications;
           $student->title=$data->title;
           $student->group=$data->group;
           $student->year=$data->year;
           $student->board=$data->board;

           $student->save();

          return redirect('allcreate.certifications');

       }
       public function view()
       {
           $user = certifications::all();

          // return response()->json($user);
         //  return view('students.allstudents', compact('user'));

          return view('allcreate.certifications', compact('user'));
       }
       public function edit($id)
       {
           //
           $user = certifications::all();
           $edit = certifications::findorfail($id);

           return view('allcreate.certifications', compact('edit', 'user'));

       }
       public function update(Request $data, $id)
       {

      //  return "ok";
   // return response()->json($data);
           $student = certifications::findorfail($id);
           $student->title=$data->title;
           $student->group=$data->group;
           $student->year=$data->year;
           $student->board=$data->board;

           $student->save();

          return redirect('allcreate.certifications');

       }

       public function destroy($id)
       {
           //
           $user = certifications::findorfail($id);
           $user->delete();
   
           return redirect('allcreate.certifications');
       }
}
