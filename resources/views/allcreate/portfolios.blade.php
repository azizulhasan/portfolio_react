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
                        <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> add portfolios</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-2"> View</a></li>
                        @isset($edit)
                        <li><a class="nav-link" data-toggle="tab" href="#tab-3"> update</a></li>
                        @endisset
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">

                                <form action="{{ route('store.portfolios') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <fieldset>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">title:</label>
                                        <div class="col-sm-10"><input type="text" name="title" class="form-control" placeholder="title"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">website:</label>
                                        <div class="col-sm-10"><input type="text" name="website" class="form-control" placeholder="website"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">filtername:</label>
                                        <div class="col-sm-10"><input type="text" name="filtername" class="form-control" placeholder="filtername"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">images:</label>
                                        <div class="col-sm-10"><input type="file" name="images" class="form-control" placeholder="images"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">hoverimages:</label>
                                        <div class="col-sm-10"><input type="file" name="hoverimages" class="form-control" placeholder="hoverimages"></div>
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
                                                  <th data-hide="all">website</th>
                                                  <th data-hide="all">filtername</th>
                                                  <th data-hide="phone">images</th>
                                                  <th data-hide="phone,tablet" >hoverimages</th>

                                                  <th class="text-right" data-sort-ignore="true">Action</th>

                                              </tr>
                                              </thead>
                                              <tbody>
                                            {{-- {{ $user->address }} --}}
                                               @foreach($user as $data);
                                              <tr>
                                                  <td>
                                                    {{ $data->id }}
                                                  </td>
                                                  <td>
                                                      {{ $data->title }}
                                                  </td>
                                                  <td>
                                                      {{ $data->website }}
                                                  </td>
                                                  <td>
                                                    {{ $data->filtername }}
                                                </td>
                                                  <td>
                                                     <img src="{{ $data->images }}" height="100" width="100">
                                                  </td>
                                                  <td>
                                                    <img src="{{ $data->hoverimages }}" height="100" width="100">
                                                 </td>

                                                  <td>
                                                      <span class="label label-primary">Enable</span>
                                                  </td>
                                                  <td class="text-right">
                                                      <div class="btn-group">
                                                         <a href="{{ URL::to('view/portfolios/'.$data->id) }}"><button class="btn-white btn btn-xs">View</button></a>
                                                         <a href="{{ URL::to('edit/portfolios/'.$data->id) }}"><button class="btn-white btn btn-xs">Edit</button></a>
                                                         <a href="{{ URL::to('delete/portfolios/'.$data->id) }}"><button class="btn-white btn btn-xs">Delete</button></a>
                                                       

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
                                <form action="{{URL::to('update/portfolios/'.$edit->id)  }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <fieldset>
                                     <div class="form-group row"><label class="col-sm-2 col-form-label">title:</label>
                                        <div class="col-sm-10"><input type="text" name="title" value="{{ $edit->title }}"class="form-control" placeholder="title"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">website:</label>
                                        <div class="col-sm-10"><input type="text" name="website" value="{{ $edit->website }}"class="form-control" placeholder="website"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">filtername:</label>
                                        <div class="col-sm-10"><input type="text" name="filtername" value="{{ $edit->filtername }}"class="form-control" placeholder="filtername"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">images:</label>
                                        <div class="col-sm-10"><input type="file" name="images" class="form-control" placeholder="images"></div><br>
                                        <label class="col-sm-2 col-form-label">old images:</label>
                                        <img src="{{ URL::to($edit->images) }}" height="200" width="300">
                                        <input type="hidden" name="old_images" value="{{ $edit->images }}" class="form-control">
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">hoverimages:</label>
                                        <div class="col-sm-10"><input type="file" name="hoverimages" class="form-control" placeholder="images"></div><br>
                                        <label class="col-sm-2 col-form-label">old images:</label>
                                        <img src="{{ URL::to($edit->hoverimages) }}" height="200" width="300">
                                        <input type="hidden" name="old_hoverimages" value="{{ $edit->hoverimages }}" class="form-control">
                                       
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
