<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
//use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\educations;
use App\User;
//images upload
use Illuminate\Http\UploadedFile;

class EducationsController extends Controller
{
   public function educations(){

    return view('allcreate.educations');

   }
}
