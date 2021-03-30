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
                        <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> edit post</a></li>
                    </ul>
                    <div class="tab-content">


                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">

                                <form action="{{ url('update/post/'.$post->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <fieldset>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Title:</label>
                                        <div class="col-sm-10"><input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Title"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Details:</label>
                                        <div class="col-sm-10"><input type="text" name="details" value="{{ $post->details }}"class="form-control" placeholder="Details"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Category:</label>
                                        <div class="col-sm-10">

                                            <select class="form-control" name="category_id">
                                                <option>select category</option>

                                                @foreach($category as $c);
                                                <option value="{{ $c->id }}" <?php if($c->id == $post->category_id) echo "selected" ;?>>{{ $c->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">images:</label>
                                        <div class="col-sm-10"><input type="file" name="images" class="form-control" placeholder="images"></div><br>
                                        <label class="col-sm-2 col-form-label">old images:</label>
                                        <img src="{{ URL::to($post->images) }}" height="200" width="300">
                                        <input type="hidden" name="old_images" value="{{ $post->images }}" class="form-control">
                                       
                                    </div>
                                    <input type="submit" value="save" class="btn btn-outline-info">
                                </fieldset>
                            </form>
                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </div>

</div>

@endsection
