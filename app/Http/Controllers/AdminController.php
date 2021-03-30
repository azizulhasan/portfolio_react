<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


//images upload
use Illuminate\Http\UploadedFile;



class AdminController extends Controller
{
    
    public function index(){

        return view('admin.index');
    }

    public function insert(){

        $users = DB::table('categories')->get();

        return view('admin.insert', compact('users'));
    }


    public function add_category(Request $reg){
     //   $data =array();
        $data['name'] =$reg->name;
        $data['slug'] =$reg->slug;
    //    print_r($data);

    //$category =  DB::insert("insert into categories (name, slug) values (?,?)", [
        //      'hasan','hasan@gmail.com'
        //  ]);

        $category= DB::table('categories')->insert($data);
    //$category = DB::table('categories')->$data;
   // return response()->json($data);
   if($category){

    return redirect('admin.insert');
    //return "ok";

   }else{
    return "not";
   }

    }

    public function anyvalidation(Request $reg){
        $validation =$reg->validate([
            'name' =>'required | unique:categories|max:25|min:4',
            'slug' => 'required|unique:categories|max:30|min:8']);

        $data['name'] =$reg->name;
        $data['slug'] =$reg->slug;

        $category= DB::table('categories')->insert($data);

       if($category){

    return redirect('admin.insert');
    //return "ok";

   }else{
    return "not";
   }

    }

    public function view(){

        $users = DB::table('categories')->get();

        return view('admin.view', compact('users'));
    }

    public function profileview($id){

       // $users = DB::table('categories')->get()->first();
       $users = DB::table('categories')->where('id', $id)->first();

      // return print_r($users);
      //  return view('admin.profileview',compact('users'));

      return view('admin.profileview')->with('user',$users);
    }

    public function deletecategory($id){

        // $users = DB::table('categories')->get()->first();
        $users = DB::table('categories')->where('id', $id)->delete();

       // return print_r($users);
       //  return view('admin.profileview',compact('users'));
       if(isset($users)){

           //return view('admin.view')->with('user',$users);
           return redirect('admin.view');
       }
       else{
           return "not ok";
       }

     //  return view('admin.view')->with('user',$users);
     }

    public function editcategory($id){

        $users = DB::table('categories')->where('id', $id)->first();

       // return print_r($users);

        return view('admin.edit',compact('users'));

    }
    public function updatecategory(Request $reg, $id){
        //   $data =array();
           $data['name'] =$reg->name;
           $data['slug'] =$reg->slug;
       //    print_r($data);

       //$category =  DB::insert("insert into categories (name, slug) values (?,?)", [
           //      'hasan','hasan@gmail.com'
           //  ]);

           $users = DB::table('categories')->where('id', $id)->update($data);
       //$category = DB::table('categories')->$data;
      // return response()->json($data);
      if($users){

       //return redirect('admin/edit/'. $id);
       //return "ok";
       return redirect('admin.view');


      }else{
       return "not";
      }

       }


       public function adminpost(Request $reg){
        //   $data =array();
           $data['title'] =$reg->title;
           $data['details'] =$reg->details;
           $data['category_id'] =$reg->category_id;
           $image=$reg->file('images');
       //    print_r($data);

       //$category =  DB::insert("insert into categories (name, slug) values (?,?)", [
           //      'hasan','hasan@gmail.com'
           //  ]);


       //$category = DB::table('categories')->$data;
      // return response()->json($data);
      if($image){

            $image_name=hexdec(uniqid());
            $ext =strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/admin/images/';
            $image_url=$upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['images']=$image_url;
        DB::table('posts')->insert($data);
       return redirect('admin.insert');


      }else{
        DB::table('posts')->insert($data);
        return redirect('admin.insert');
      }

       }

       public function allpostview(){

        //one to one join start
        // $user = DB::table('posts')
        // ->join('categories', 'posts.category_id', 'categories.id')
        // ->select('posts.*', 'categories.name')
        // ->get();
        //one to one join end

        ///pagination
         $user = DB::table('posts')
        ->join('categories', 'posts.category_id', 'categories.id')
        ->select('posts.*', 'categories.name')
        ->paginate(3);

        ///pagination



       // $user = DB::table('posts')->get();

        return view('admin.allpost', compact('user'));
    }



    public function postview($id){

        // one to one join start
        $users = DB::table('posts')
        ->join('categories', 'posts.category_id', 'categories.id')
        ->select('posts.*', 'categories.name')
        ->where('posts.id', $id)
        ->first();

        //one to one join end
     //   $users = DB::table('posts')->where('id', $id)->first();
       // $user = DB::table('posts')->get();

        return view('admin.viewpost', compact('users'));
    }




    public function editpost($id){

        $category = DB::table('categories')->get();

       $post = DB::table('posts')->where('id', $id)->first();


        return view('admin.editpost', compact('post', 'category'));
    }



    public function updatepost(Request $reg, $id){
        //   $data =array();
           $data['title'] =$reg->title;
           $data['details'] =$reg->details;
           $data['category_id'] =$reg->category_id;
           $image=$reg->file('images');
       //    print_r($data);

       //$category =  DB::insert("insert into categories (name, slug) values (?,?)", [
           //      'hasan','hasan@gmail.com'
           //  ]);


       //$category = DB::table('categories')->$data;
      // return response()->json($data);
      if($image){

            $image_name=hexdec(uniqid());
            $ext =strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/admin/images/';
            $image_url=$upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['images']=$image_url;
            unlink($reg->old_images);
             DB::table('posts')->where('id', $id)->update($data);
       return redirect('admin.allpost');


      }else{
       // $data['images']->$reg->old_images;
        DB::table('posts')->where('id', $id)->update($data);
        return redirect('admin.allpost');
      }

       }



       public function deletepost($id){
        $post = DB::table('posts')->where('id', $id)->first();
        $image = $post->images;
        // $users = DB::table('categories')->get()->first();
        $users = DB::table('posts')->where('id', $id)->delete();

       // return print_r($users);
       //  return view('admin.profileview',compact('users'));
       if(isset($users)){

            unlink($image);
           //return view('admin.view')->with('user',$users);
           return redirect('admin.allpost');
       }
       else{
           return "not ok";
       }

     //  return view('admin.view')->with('user',$users);
     }



}

