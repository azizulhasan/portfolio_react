<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Experiences;

//images upload
use Illuminate\Http\UploadedFile;
class ExperiencesController extends Controller
{
    public function experiences()
    {
       return view('allcreate.experiences');
    }


    public function store(Request $data)
    {

        $student = new Experiences;
        $student->title=$data->title;
        $student->designation=$data->designation;
        $student->year=$data->year;
        $student->description=$data->description;
        $student->save();

        return redirect('allcreate.experiences');

    }
    public function view()
    {
        $user = Experiences::all();

       // return response()->json($user);
      //  return view('students.allstudents', compact('user'));

       return view('allcreate.experiences', compact('user'));
    }
    public function edit($id)
    {
        //
        $user = Experiences::all();
        $edit = Experiences::findorfail($id);

        return view('allcreate.experiences', compact('edit', 'user'));

    }
    public function update(Request $data, $id)
    {

        $student = Experiences::findorfail($id);
        $student->title=$data->title;
        $student->designation=$data->designation;
        $student->year=$data->year;
        $student->description=$data->description;
        $student->save();

        return redirect('allcreate.experiences');

    }
    public function destroy($id)
    {
        //
        $user = Experiences::findorfail($id);
        $user->delete();

        return redirect('allcreate.experiences');
    }
}
