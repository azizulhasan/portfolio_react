<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Contacts;
use App\Usercontacts;

//images upload
use Illuminate\Http\UploadedFile;

class ContactsController extends Controller
{
    public function contacts()
    {
       return view('allcreate.contacts');
    }


    public function store(Request $data)
    {

        $student = new Contacts;
        $student->address=$data->address;
        $student->city=$data->city;
        $student->country=$data->country;
        $student->email=$data->email;
        $student->phone=$data->phone;
        $student->description=$data->description;
        $student->save();

        return redirect('allcreate.contacts');

    }
    public function view()
    {
        $users = Usercontacts::all();
        $user = Contacts::all();

       // return response()->json($user);
      //  return view('students.allstudents', compact('user'));

       return view('allcreate.contacts', compact('user', 'users'));
    }
    public function edit($id)
    {
        //
        $user = Contacts::all();
        $edit = Contacts::findorfail($id);

        return view('allcreate.contacts', compact('edit', 'user'));

    }

    public function update(Request $data, $id)
    {

        $student = Contacts::findorfail($id);
        $student->address=$data->address;
        $student->city=$data->city;
        $student->country=$data->country;
        $student->email=$data->email; 
        $student->phone=$data->phone;
        $student->description=$data->description;
        $student->save();

        return redirect('allcreate.contacts');

    }
    public function destroy($id)
    {
        //
        $user = Contacts::findorfail($id);
        $user->delete();

        return redirect('allcreate.contacts');
    }

}
