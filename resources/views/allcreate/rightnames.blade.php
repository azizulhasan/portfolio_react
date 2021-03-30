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
                        <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> add rightnames</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-2"> View</a></li>
                        @isset($edit)
                        <li><a class="nav-link" data-toggle="tab" href="#tab-3"> update</a></li>
                        @endisset
                        <li><a class="nav-link" data-toggle="tab" href="#tab-4"> View user list</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">

                                <form action="{{ route('store.rightnames') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <fieldset>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">title:</label>
                                        <div class="col-sm-10"><input type="text" name="title" class="form-control" placeholder="title"></div>                                     
                                    </div>     
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">owner:</label>
                                      
                                        <div class="col-sm-10"><input type="text" name="owner"class="form-control" placeholder="owner"></div>
                                    </div>                                
                                  
                                    <input type="submit" value="save" class="btn btn-outline-info">
                                </fieldset>
                            </form>
                            </div>
                        </div>
<div id="tab-2" class="tab-pane">
  <div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">

                <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                    <thead>
                    <tr>
                        <th data-toggle="true">No</th>
                        <th data-toggle="true">title</th>    
                        <th data-toggle="true">owner</th>    
                     
                        <th class="text-right" data-sort-ignore="true">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                  {{-- {{ $user->address }} --}}
                     @foreach($rightnames as $right);
                    <tr>
                        <td>
                          {{ $right->id }}
                        </td>
                        <td>
                            {{ $right->title }}
                        </td>
                        <td>
                            {{ $right->owner }}
                        </td>
                        
                        <td>
                            <span class="label label-primary">Enable</span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                               <a href="{{ URL::to('view/rightnames/'.$right->id) }}"><button class="btn-white btn btn-xs">View</button></a>
                               <a href="{{ URL::to('edit/rightnames/'.$right->id) }}"><button class="btn-white btn btn-xs">Edit</button></a>
                               <a href="{{ URL::to('delete/rightnames/'.$right->id) }}"><button class="btn-white btn btn-xs">Delete</button></a>


                            </div>
                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td>
                            Example product 10
                        </td>
                        <td>
                            Model 10
                        </td>
                        <td>
                            It is a long established fact that a reader will be distracted by the readable
                            content of a page when looking at its layout. The point of using Lorem Ipsum is
                            that it has a more-or-less normal distribution of letters, as opposed to using
                            'Content here, content here', making it look like readable English.
                        </td>
                        <td>
                            $43.00
                        </td>
                        <td>
                            7600
                        </td>
                        <td>
                            <span class="label label-primary">Enable</span>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <button class="btn-white btn btn-xs">View</button>
                                <button class="btn-white btn btn-xs">Edit</button>
                            </div>
                        </td>
                    </tr>


                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="6">
                            <ul class="pagination float-right"></ul>
                        </td>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>
</div>
                    <div id="tab-3" class="tab-pane">
                        <div class="panel-body">
                            @isset($edit)
                            <form action="{{URL::to('update/rightnames/'.$edit->id)  }}" method="post" enctype="multipart/form-data">
                                @csrf
                            <fieldset>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">title:</label>
                                    <div class="col-sm-10"><input type="text" name="title"  value="{{ $edit->title }}"class="form-control" placeholder="title"></div>
                                
                                </div>   
                                <div class="form-group row"><label class="col-sm-2 col-form-label">owner:</label>
                                  
                                    <div class="col-sm-10"><input type="text" name="owner"  value="{{ $edit->owner }}"class="form-control" placeholder="owner"></div>
                                </div>                                                 
                               
                                <input type="submit" value="save" class="btn btn-outline-info">
                            </fieldset>
                        </form>
                        @endisset
                        </div>
                    </div>

                     <div id="tab-4" class="tab-pane">
                        <div class="row">
                          <div class="col-lg-12">
                              <div class="ibox">
                                  <div class="ibox-content">
                      
                                      <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                          <thead>
                                          <tr>
                                              <th data-toggle="true">No</th>
                                              <th data-toggle="true">name</th>
                                              <th data-hide="all">email</th>                                      
                                              <th data-hide="phone,tablet" >message</th>
                                              <th class="text-right" data-sort-ignore="true">Action</th>
                                           
                      
                                          </tr>
                                          </thead>
                                          {{-- <tbody>
                                         {{ $user->address }} 
                                           @foreach($users as $data);
                                          <tr>
                                              <td>
                                                {{ $data->id }}
                                              </td>
                                              <td>
                                                  {{ $data->name }}
                                              </td>
                                              <td>
                                                  {{ $data->email }}
                                              </td>
                                              <td>
                                                  {{ $data->message }}
                                              </td>
                                             
                                             
                                              <td>
                                                  <span class="label label-primary">Enable</span>
                                              </td>
                                              <td class="text-right">
                                                  <div class="btn-group">
                                                     <a href="{{ URL::to('view/contacts/'.$data->id) }}"><button class="btn-white btn btn-xs">View</button></a>
                                                     <a href="{{ URL::to('edit/contacts/'.$data->id) }}"><button class="btn-white btn btn-xs">Edit</button></a>
                                                     <a href="{{ URL::to('delete/contacts/'.$data->id) }}"><button class="btn-white btn btn-xs">Delete</button></a>
                      
                      
                                                  </div>
                                              </td>
                                          </tr>
                                          @endforeach
                      
                                          <tr>
                                              <td>
                                                  Example product 10
                                              </td>
                                              <td>
                                                  Model 10
                                              </td>
                                              <td>
                                                  It is a long established fact that a reader will be distracted by the readable
                                                  content of a page when looking at its layout. The point of using Lorem Ipsum is
                                                  that it has a more-or-less normal distribution of letters, as opposed to using
                                                  'Content here, content here', making it look like readable English.
                                              </td>
                                              <td>
                                                  $43.00
                                              </td>
                                              <td>
                                                  7600
                                              </td>
                                              <td>
                                                  <span class="label label-primary">Enable</span>
                                              </td>
                                              <td class="text-right">
                                                  <div class="btn-group">
                                                      <button class="btn-white btn btn-xs">View</button>
                                                      <button class="btn-white btn btn-xs">Edit</button>
                                                  </div>
                                              </td>
                                          </tr>
                      
                      
                                          </tbody> --}}
                                          <tfoot>
                                          <tr>
                                              <td colspan="6">
                                                  <ul class="pagination float-right"></ul>
                                              </td>
                                          </tr>
                                          </tfoot>
                                      </table>
                      
                                  </div>
                              </div>
                          </div>
                      </div>
                      </div>

                    </div> 
            </div>
        </div>
    </div>

</div>

@endsection
