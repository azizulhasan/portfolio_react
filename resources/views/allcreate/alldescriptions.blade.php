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
                        <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> add desciptions</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-2"> View</a></li>
                        @isset($edit)
                        <li><a class="nav-link" data-toggle="tab" href="#tab-3"> update</a></li>
                        @endisset


                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">

                                <form action="{{ route('store.alldescriptions') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <fieldset>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Profile:</label>
                                        <div class="col-sm-10"><input type="text" name="profile" class="form-control" placeholder="profile"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">SKILL:</label>
                                        <div class="col-sm-10"><input type="text" name="skill" class="form-control" placeholder="skill"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">RESUME:</label>
                                        <div class="col-sm-10"><input type="text" name="resume" class="form-control" placeholder="resume"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">EDUCATION:</label>
                                        <div class="col-sm-10"><input type="text" name="education" class="form-control" placeholder="education"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">EXPERIENCE:</label>
                                        <div class="col-sm-10"><input type="text" name="experience" class="form-control" placeholder="experience"></div>
                                    </div>

                                    <div class="form-group row"><label class="col-sm-2 col-form-label">PORTFOLIO:</label>
                                        <div class="col-sm-10"><input type="text" name="portfolio" class="form-control" placeholder="email"></div>
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
                                                  <th data-toggle="true">profile</th>
                                                  <th data-toggle="true">skill</th>
                                                  <th data-toggle="true">resume</th>
                                                  <th data-hide="all">education</th>
                                                  <th data-hide="phone">experience</th>
                                                  <th data-hide="phone,tablet" >portfolio</th>
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
                                                    {{ $data->profile }}
                                                </td>
                                                <td>
                                                    {{ $data->skill }}
                                                </td>
                                                  <td>
                                                      {{ $data->resume }}
                                                  </td>
                                                  <td>
                                                      {{ $data->education }}
                                                  </td>
                                                  <td>
                                                      {{ $data->experience }}
                                                  </td>
                                                  <td>
                                                      {{ $data->portfolio }}
                                                  </td>

                                                  <td>
                                                      <span class="label label-primary">Enable</span>
                                                  </td>
                                                  <td class="text-right">
                                                      <div class="btn-group">
                                                         <a href="{{ URL::to('view/alldescriptions/'.$data->id) }}"><button class="btn-white btn btn-xs">View</button></a>
                                                         <a href="{{ URL::to('edit/alldescriptions/'.$data->id) }}"><button class="btn-white btn btn-xs">Edit</button></a>
                                                         <a href="{{ URL::to('delete/alldescriptions/'.$data->id) }}"><button class="btn-white btn btn-xs">Delete</button></a>


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
                          @isset($edit)
                          <div id="tab-3" class="tab-pane">
                            <div class="panel-body">

                                <form action="{{URL::to('update/alldescriptions/'.$edit->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <fieldset>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">PROFILE:</label>
                                        <div class="col-sm-10"><input type="text" name="profile"  value="{{ $edit->profile }}"class="form-control" placeholder="profile"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">SKILL:</label>
                                        <div class="col-sm-10"><input type="text" name="skill"  value="{{ $edit->skill }}"class="form-control" placeholder="skill"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">RESUME:</label>
                                        <div class="col-sm-10"><input type="text" name="resume"  value="{{ $edit->resume }}"class="form-control" placeholder="resume"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">EDUCATION:</label>
                                        <div class="col-sm-10"><input type="text" name="education" value="{{ $edit->education }}" class="form-control" placeholder="education"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">EXPERIENCE:</label>
                                        <div class="col-sm-10"><input type="text" name="experience"  value="{{ $edit->experience }}"class="form-control" placeholder="experience"></div>
                                    </div>

                                    <div class="form-group row"><label class="col-sm-2 col-form-label">PORTFOLIO:</label>
                                        <div class="col-sm-10"><input type="text" name="portfolio" value="{{ $edit->portfolio }}" class="form-control" placeholder="email"></div>
                                    </div>
                                    <input type="submit" value="save" class="btn btn-outline-info">
                                </fieldset>
                            </form>
                            </div>
                        </div>
                        @endisset
                    </div>
            </div>
        </div>
    </div>

</div>

@endsection
