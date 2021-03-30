@extends('welcome');
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Blog</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Miscellaneous</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Blog</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content  animated fadeInRight blog">
<div class="row">
  

    <div class="col-lg-4">
      
      
        <div class="ibox">
            <div class="ibox-content">
                <img src="" height="300" width="500">
                <a href="article.html" class="btn-link">
                    <h2>
                        {{ $user->name }}
                      

                    </h2>
                </a>
                <div class="small m-b-xs">
                    <strong>Adam Novak</strong> <span class="text-muted"><i class="fa fa-clock-o"></i> 28th Oct 2015</span>
                </div>
                <p>
                    {{ $user->email }}
                </p>
                <p>
                    {{ $user->phone }}
                </p>
                <div class="row">
                    <div class="col-md-6">
                            <h5>Tags:</h5>
                            <button class="btn btn-primary btn-xs" type="button">Model</button>
                            <button class="btn btn-white btn-xs" type="button">Publishing</button>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-right">
                            <h5>Stats:</h5>
                            <div> <i class="fa fa-comments-o"> </i> 56 comments </div>
                            <i class="fa fa-eye"> </i> 144 views
                        </div>
                    </div>
                    <div class="col-md-6">

                         {{-- <a href="{{ URL::to('edit/post/'.$d->id) }}"><button class="btn btn-info btn-xs" type="button">Edit</button></a>
                        <a href="{{ URL::to('view/student/'.$d->id) }}"><button class="btn btn-success btn-xs" type="button">View</button></a>
                        <a href="{{ URL::to('delete/post/'.$d->id) }}"><button class="btn btn-danger btn-xs" type="button">delete</button> </a>  --}}
                </div>
                </div>
            </div>
        </div>
      
        <div class="col-md-6">

       {{-- <button class="btn btn-info btn-xs" type="button">{{ $user->links() }}</button> --}}
           
    </div>
        
    </div>
  
</div>


</div>

@endsection
