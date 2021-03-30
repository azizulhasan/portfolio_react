<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\socialicons;
//images upload
use Illuminate\Http\UploadedFile;

class SocialiconsController extends Controller
{
    public function socialicons()
    {
       return view('allcreate.socialicons');
    }
    public function store(Request $data){
        //   $data =array();
    
     //   return print_r($data);
           $student = new socialicons;
           $student->iconclass=$data->iconclass;
           $student->url=$data->url;
           $student->save();
           return redirect('allcreate.socialicons');
         

    }

    public function view()
    {
        $socialicons = socialicons::all();

       // return response()->json($user);
      

       return view('allcreate.socialicons', compact('socialicons'));
    }

    public function edit($id)
    {
        //
        $socialicons = socialicons::all();
        $edit = socialicons::findorfail($id);

        return view('allcreate.socialicons', compact('edit', 'socialicons'));

    }

    public function update(Request $data, $id){
        //   $data =array();
    
           $student = socialicons::findorfail($id);
           $student->iconclass=$data->iconclass;
           $student->url=$data->url;
           $student->save();
           return redirect('allcreate.socialicons');

    }

    public function destroy($id)
    {
        //
        $user = socialicons::findorfail($id);
        $user->delete();

        return redirect('allcreate.socialicons');
    }
}
 