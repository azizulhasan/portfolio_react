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

//images upload
use Illuminate\Http\UploadedFile;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function students()
    {
       return view('students.create');
    }


    public function storestudents(Request $data)
    {



        $student = new Students;
        $student->title=$data->title;
        $student->group=$data->group;
        $student->year=$data->year;
        $student->board=$data->board;
        $student->save();

        return redirect('students.create');

    }


    public function allstudents()
    {
       $user = Students::all();

        return view('students.allstudents', compact('user'));
    }

    public function viewstudents($id)
    {
       $user = Students::findorfail($id);

        return view('students.singleview', compact('user'));
    }

    public function edit($id)
    {
        //
        $user = Students::findorfail($id);

        return view('students.edit', compact('user'));

    }


    public function update(Request $data, $id)
    {
        //
        $student = Students::findorfail($id);;
        $student->title=$data->title;
        $student->group=$data->group;
        $student->year=$data->year;
        $student->board=$data->board;
        $student->save();

        return redirect('students.allstudents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = Students::findorfail($id);
        $user->delete();

        return redirect('students.allstudents');
    }
}
