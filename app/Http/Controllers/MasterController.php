<?php

namespace App\Http\Controllers;
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

        $student = new Usercontacts;
        $student->name=$data->name;
        $student->email=$data->email;
        $student->message=$data->message;
        $student->save();

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
