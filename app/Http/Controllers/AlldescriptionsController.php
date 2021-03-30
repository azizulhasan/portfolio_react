<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\alldescriptions;

//images upload
use Illuminate\Http\UploadedFile;

class AlldescriptionsController extends Controller
{
    public function alldescriptions()
    {
       return view('allcreate.alldescriptions');
    }


    public function store(Request $data)
    {

        $student = new alldescriptions;
        $student->profile=$data->profile;
        $student->skill=$data->skill;
        $student->resume=$data->resume;
        $student->education=$data->education;
        $student->experience=$data->experience;
        $student->portfolio=$data->portfolio;
        $student->save();

        return redirect('allcreate.alldescriptions');

    }

    public function view()
    {
        $user = alldescriptions::all();

       // return response()->json($user);
      //  return view('students.allstudents', compact('user'));

       return view('allcreate.alldescriptions', compact('user'));
    }

    public function edit($id)
    {
        //
        $user = alldescriptions::all();
        $edit = alldescriptions::findorfail($id);

        return view('allcreate.alldescriptions', compact('edit', 'user'));

    }
    public function update(Request $data, $id)
    {
        $student = alldescriptions::findorfail($id);;
        $student->profile=$data->profile;
        $student->skill=$data->skill;
        $student->resume=$data->resume;
        $student->education=$data->education;
        $student->experience=$data->experience;
        $student->portfolio=$data->portfolio;
        $student->save();

        return redirect('allcreate.alldescriptions');



    }
    public function destroy($id)
    {
        //
        $user = alldescriptions::findorfail($id);
        $user->delete();

        return redirect('allcreate.alldescriptions');
    }
}
