<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Usercontacts;

//images upload
use Illuminate\Http\UploadedFile;

use App\Skills;
use App\Certifications;
use App\experiences;
use App\contacts;
use App\testimonials;
use App\portfolios;

use App\hometitles;
use App\profilecategories;
use App\portfolioisotopes;
use App\alldescriptions;
use App\socialicons;
use App\rightnames;
use App\Mail\UserMail;


class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master');

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Skills::all();
        return view('master', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view()
    { 
        $certifications = Certifications::all();
        $user = Skills::all();
        $experiences = experiences::all();
        $testimonials = testimonials::all();
        $contacts = contacts::all();
        $portfolios = portfolios::all();
        $hometitles = hometitles::all();
        $profilecategories = profilecategories::all();
        $portfolioisotopes = portfolioisotopes::all();
        $alldescriptions = alldescriptions::all();
        $socialicons = socialicons::all();
        $rightnames = rightnames::all();
        return view('master', compact('certifications','user', 'experiences', 'contacts', 'testimonials', 'portfolios', 'hometitles', 'profilecategories', 'portfolioisotopes', 'alldescriptions', 'socialicons', 'rightnames'));

    }
    
    public function usercontactsstore(Request $data)
    {
        $data = json_decode($data->data);
       
        $student = new Usercontacts;
        $student->name      =$data[0]->value;
        $student->email     =$data[1]->value;
        $student->message   =$data[3]->value;

        $student->save();
        

        $to = "azizulhasan.webappick@gmail.com";
        $txt = $data[3]->value;

        $details = [
            'from' => $data[1]->value." ".$data[2]->value,
            'body' => $txt
        ];
            $result = \Mail::to($to)->queue(new UserMail($details));
        if($result == 0){
            $response =  ['status'=> true];
        }else{
            $response =  ['status'=> false];
        }
        
        
        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }


    
}
