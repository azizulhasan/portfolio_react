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
                        <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> add myinformations</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-2"> View</a></li>
                        @isset($edit)
                        <li><a class="nav-link" data-toggle="tab" href="#tab-3"> update</a></li>
                        @endisset

                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">

                                <form action="{{ route('store.myinformations') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <fieldset>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">name:</label>
                                        <div class="col-sm-10"><input type="text" name="name" class="form-control" placeholder="name"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">father's name:</label>
                                        <div class="col-sm-10"><input type="text" name="father" class="form-control" placeholder="father's name"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">mother's name:</label>
                                        <div class="col-sm-10"><input type="text" name="mother" class="form-control" placeholder="mother's name:"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">email:</label>
                                        <div class="col-sm-10"><input type="text" name="email" class="form-control" placeholder="email"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">phone:</label>
                                        <div class="col-sm-10"><input type="text" name="phone" class="form-control" placeholder="phone"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">date of birth:</label>
                                        <div class="col-sm-10"><input type="text" name="birth" class="form-control" placeholder="date of birth:"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">present address:</label>
                                        <div class="col-sm-10"><input type="text" name="present" class="form-control" placeholder="present address"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">permanet address:</label>
                                        <div class="col-sm-10"><input type="text" name="permanet" class="form-control" placeholder="permanet address:"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">nationality:</label>
                                        <div class="col-sm-10"><input type="text" name="nationality" class="form-control" placeholder="nationality"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">married status:</label>
                                        <div class="col-sm-10"><input type="text" name="married" class="form-control" placeholder="married status:"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">designation:</label>
                                        <div class="col-sm-10"><input type="text" name="designation" class="form-control" placeholder="designation"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">blood Group:</label>
                                        <div class="col-sm-10"><input type="text" name="blood" class="form-control" placeholder="blood Group"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">gender:</label>
                                        <div class="col-sm-10"><input type="text" name="gender" class="form-control" placeholder="gender"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">description:</label>
                                        <div class="col-sm-10"><input type="text" name="description" class="form-control" placeholder="description"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">image:</label>
                                        <div class="col-sm-10"><input type="file" name="image" class="form-control" placeholder="image"></div>
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

                                                  <th data-toggle="true">name</th>
                                                  <th data-toggle="true">father</th>
                                                  <th data-toggle="true">mother</th>
                                                  <th data-toggle="true">email</th>
                                                  <th data-toggle="true">phone</th>
                                                  <th data-hide="all">birth</th>
                                                  <th data-hide="phone">present</th>
                                                  <th data-hide="phone,tablet" >permanet</th>
                                                  <th data-hide="phone">designation</th>


                                                  <th data-hide="phone">description</th>
                                                  <th data-hide="phone">image</th>
                                                  <th class="text-right" data-sort-ignore="true">Action</th>

                                              </tr>
                                              </thead>
                                              <tbody>
                                            {{-- {{ $user->address }} --}}
                                               @foreach($user as $data);
                                              <tr>

                                                  <td>
                                                      {{ $data->name }}
                                                  </td>
                                                  <td>
                                                      {{ $data->father }}
                                                  </td>
                                                  <td>
                                                      {{ $data->mother }}
                                                  </td>
                                                  <td>
                                                      {{ $data->email }}
                                                  </td>
                                                  <td>
                                                      {{ $data->phone }}
                                                  </td>

                                                  <td>
                                                      {{ $data->birth }}
                                                  </td>
                                                  <td>
                                                    {{ $data->present }}
                                                </td>
                                                <td>
                                                    {{ $data->permanet }}
                                                </td>
                                                <td>
                                                    {{ $data->designation }}
                                                </td>

                                                <td>
                                                    {{ $data->description }}
                                                </td>
                                                <td>
                                                    <img src="{{ $data->image }}" height="100" width="100">
                                                </td>


                                                  <td class="text-right">
                                                      <div class="btn-group">
                                                         <a href="{{ URL::to('view/myinformations/'.$data->id) }}"><button class="btn-white btn btn-xs">View</button></a>
                                                         <a href="{{ URL::to('edit/myinformations/'.$data->id) }}"><button class="btn-white btn btn-xs">Edit</button></a>
                                                         <a href="{{ URL::to('delete/myinformations/'.$data->id) }}"><button class="btn-white btn btn-xs">Delete</button></a>

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
                                <form action="{{URL::to('update/myinformations/'.$edit->id)  }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <fieldset>
                           

                                    <div class="form-group row"><label class="col-sm-2 col-form-label">name:</label>
                                        <div class="col-sm-10"><input type="text" name="name" value="{{ $edit->name }}" class="form-control" placeholder="name"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">father's name:</label>
                                        <div class="col-sm-10"><input type="text" name="father" value="{{ $edit->father }}" class="form-control" placeholder="father's name"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">mother's name:</label>
                                        <div class="col-sm-10"><input type="text" name="mother" value="{{ $edit->mother }}" class="form-control" placeholder="mother's name:"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">email:</label>
                                        <div class="col-sm-10"><input type="text" name="email" value="{{ $edit->email }}" class="form-control" placeholder="email"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">phone:</label>
                                        <div class="col-sm-10"><input type="text" name="phone" value="{{ $edit->phone }}" class="form-control" placeholder="phone"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">date of birth:</label>
                                        <div class="col-sm-10"><input type="text" name="birth" value="{{ $edit->birth }}" class="form-control" placeholder="date of birth:"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">present address:</label>
                                        <div class="col-sm-10"><input type="text" name="present" value="{{ $edit->present }}" class="form-control" placeholder="present address"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">permanet address:</label>
                                        <div class="col-sm-10"><input type="text" name="permanet" value="{{ $edit->permanet }}" class="form-control" placeholder="permanet address:"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">nationality:</label>
                                        <div class="col-sm-10"><input type="text" name="nationality" value="{{ $edit->nationality }}" class="form-control" placeholder="nationality"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">married status:</label>
                                        <div class="col-sm-10"><input type="text" name="married" value="{{ $edit->married }}" class="form-control" placeholder="married status:"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">designation:</label>
                                        <div class="col-sm-10"><input type="text" name="designation" value="{{ $edit->designation }}" class="form-control" placeholder="designation"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">blood Group:</label>
                                        <div class="col-sm-10"><input type="text" name="blood" value="{{ $edit->blood }}" class="form-control" placeholder="blood Group"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">gender:</label>
                                        <div class="col-sm-10"><input type="text" name="gender" value="{{ $edit->gender }}" class="form-control" placeholder="gender"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">description:</label>
                                        <div class="col-sm-10"><input type="text" name="description" value="{{ $edit->description }}" class="form-control" placeholder="description"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">image:</label>
                                        <div class="col-sm-10"><input type="file" name="image" class="form-control" placeholder="images"></div><br>
                                        <label class="col-sm-2 col-form-label">old images:</label>
                                        <img src="{{ URL::to($edit->image) }}" height="200" width="300">
                                        <input type="hidden" name="old_images" value="{{ $edit->image }}" class="form-control">
                                    </div>

                                    <input type="submit" value="save" class="btn btn-outline-info">
                                </fieldset>
                            </form>
                            @endisset
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</div>

@endsection
