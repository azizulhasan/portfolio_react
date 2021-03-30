<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\profilecategories;

//images upload
use Illuminate\Http\UploadedFile;

class ProfilecategoriesController extends Controller
{
    public function profilecategories()
    {
       return view('allcreate.profilecategories');
    }


    public function store(Request $data)
    {

        $student = new profilecategories;
        $student->title=$data->title;
        $student->icon=$data->icon;
        $student->fadetime=$data->fadetime;
        $student->description=$data->description;
        $student->save();

        return redirect('allcreate.profilecategories');

    }
    public function view()
    {
        $user = profilecategories::all();

       // return response()->json($user);


       return view('allcreate.profilecategories', compact('user'));
    }

    public function edit($id)
    {
        //
        $user = profilecategories::all();
        $edit = profilecategories::findorfail($id);

        return view('allcreate.profilecategories', compact('edit', 'user'));

    }
    public function update(Request $data, $id)
    {

        $student =  profilecategories::findorfail($id);
        $student->title=$data->title;
        $student->icon=$data->icon;
        $student->fadetime=$data->fadetime;
        $student->description=$data->description;
        $student->save();

        return redirect('allcreate.profilecategories');

    }
    public function destroy($id)
    {
        //
        $user = profilecategories::findorfail($id);
        $user->delete();

        return redirect('allcreate.profilecategories');
    }


}
