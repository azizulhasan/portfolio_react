@extends('welcome');

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Product edit</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>E-commerce</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Product edit</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> add students</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-2"> Data</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-3"> any validation</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-4"> post</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-5"> Images</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">

                                <form action="{{URL::to('update/student/'.$user->id)  }}" method="post">
                                    @csrf
                                <fieldset>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Name:</label>
                                        <div class="col-sm-10"><input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="name"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">email:</label>
                                        <div class="col-sm-10"><input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="email"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">phone:</label>
                                        <div class="col-sm-10"><input type="text" name="phone" value="{{ $user->phone }}" class="form-control" placeholder="phone"></div>
                                    </div>
                                    <input type="submit" value="update" class="btn btn-outline-info">
                                </fieldset>
                            </form>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">

                                <fieldset>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">ID:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" placeholder="543"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Model:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" placeholder="..."></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Location:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" placeholder="location"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Tax Class:</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" >
                                                <option>option 1</option>
                                                <option>option 2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Quantity:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" placeholder="Quantity"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Minimum quantity:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" placeholder="2"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Sort order:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" placeholder="0"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Status:</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" >
                                                <option>option 1</option>
                                                <option>option 2</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>


                            </div>
                        </div>
                         {{-- <div id="tab-3" class="tab-pane">
                            <div class="panel-body">

                                <form action="{{ route('any.validation') }}" method="post">
                                    @csrf
                                <fieldset>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Name:</label>
                                        <div class="col-sm-10"><input type="text" name="name" class="form-control" placeholder="Category name"></div>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Price:</label>
                                        <div class="col-sm-10"><input type="text" name="slug" class="form-control" placeholder="slug"></div>
                                        @error('slug')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <input type="submit" value="save" class="btn btn-outline-info">
                                </fieldset>
                            </form>
                            </div>
                        </div> --}}
                        {{-- <div id="tab-4" class="tab-pane">
                            <div class="panel-body">

                                <form action="{{ route('admin.post') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <fieldset>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Title:</label>
                                        <div class="col-sm-10"><input type="text" name="title" class="form-control" placeholder="Title"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Details:</label>
                                        <div class="col-sm-10"><input type="text" name="details" class="form-control" placeholder="Details"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Category:</label>
                                        <div class="col-sm-10">

                                            <select class="form-control" name="category_id">
                                                <option>select category</option>

                                                @foreach($users as $c);
                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">images:</label>
                                        <div class="col-sm-10"><input type="file" name="images" class="form-control" placeholder="images"></div>

                                    </div>
                                    <input type="submit" value="save" class="btn btn-outline-info">
                                </fieldset>
                            </form>
                            </div>
                        </div> --}}
  
                    </div>
            </div>
        </div>
    </div>

</div>

@endsection
