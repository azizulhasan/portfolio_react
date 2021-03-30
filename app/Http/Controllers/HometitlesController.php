<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\hometitles;

//images upload
use Illuminate\Http\UploadedFile;

class HometitlesController extends Controller
{
    public function hometitles()
    {
       return view('allcreate.hometitles');
    }


    public function store(Request $data)
    {

        $student = new hometitles;
        $student->title1=$data->title1;
        $student->title2=$data->title2;
        $student->title3=$data->title3;

        $student->save();

        return redirect('allcreate.hometitles');

    }
    public function view()
    {
        $user = hometitles::all();

       // return response()->json($user);


       return view('allcreate.hometitles', compact('user'));
    }

    public function edit($id)
    {
        //
        $user = hometitles::all();
        $edit = hometitles::findorfail($id);

        return view('allcreate.hometitles', compact('edit', 'user'));

    }
    public function update(Request $data, $id)
    {

        $student =  hometitles::findorfail($id);
        $student->title1=$data->title1;
        $student->title2=$data->title2;
        $student->title3=$data->title3;

        $student->save();

        return redirect('allcreate.hometitles');

    }
    public function destroy($id) 
    {
     // return  print_r($id);
        //
        $user = hometitles::findorfail($id);
        $user->delete();

        return redirect('allcreate.hometitles');
    }
}
