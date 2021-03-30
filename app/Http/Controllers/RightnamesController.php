<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\rightnames;
//images upload
use Illuminate\Http\UploadedFile;

class RightnamesController extends Controller
{
    public function rightnames()
    {
       return view('allcreate.rightnames');
    }
    public function store(Request $data){
        //   $data =array();
    
     //   return print_r($data);
           $student = new rightnames;
           $student->title=$data->title;
           $student->owner=$data->owner;
           $student->save();
           return redirect('allcreate.rightnames');
         

    }

    public function view()
    {
        $rightnames = rightnames::all();

       // return response()->json($user);
      

       return view('allcreate.rightnames', compact('rightnames'));
    }
    
    public function edit($id)
    {
        //
        $rightnames = rightnames::all();
        $edit = rightnames::findorfail($id);

        return view('allcreate.rightnames', compact('edit', 'rightnames'));

    }

    
    public function update(Request $data, $id){
        //   $data =array();
    
           $student = rightnames::findorfail($id);
           $student->title=$data->title;
           $student->owner=$data->owner;
          
           $student->save();
           return redirect('allcreate.rightnames');

    }


    public function destroy($id)
    {
        //
        $user = rightnames::findorfail($id);
        $user->delete();

        return redirect('allcreate.rightnames');
    }


}
