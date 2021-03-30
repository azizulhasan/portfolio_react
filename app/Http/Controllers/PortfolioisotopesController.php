<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\portfolioisotopes;
//images upload
use Illuminate\Http\UploadedFile;

class PortfolioisotopesController extends Controller
{
    public function portfolioisotopes()
    {
       return view('allcreate.portfolioisotopes');
    }

    public function store(Request $data){
        //   $data =array();
    
     //   return print_r($data);
           $student = new portfolioisotopes;
           $student->title=$data->title;
           $student->filtername=$data->filtername;
           $student->save();
           return redirect('allcreate.portfolioisotopes');
         

    }
    public function view()
    {
        $portfolioisotopes = portfolioisotopes::all();

       // return response()->json($user);
      

       return view('allcreate.portfolioisotopes', compact('portfolioisotopes'));
    }
    public function edit($id)
    {
        //
        $portfolioisotopes = portfolioisotopes::all();
        $edit = portfolioisotopes::findorfail($id);

        return view('allcreate.portfolioisotopes', compact('edit', 'portfolioisotopes'));

    }


    public function update(Request $data, $id){
        //   $data =array();
    
           $student = portfolioisotopes::findorfail($id);
           $student->title=$data->title;
           $student->filtername=$data->filtername;
           $student->save();
           return redirect('allcreate.portfolioisotopes');

    }

    public function destroy($id)
    {
        //
        $user = portfolioisotopes::findorfail($id);
        $user->delete();

        return redirect('allcreate.portfolioisotopes');
    }


}
