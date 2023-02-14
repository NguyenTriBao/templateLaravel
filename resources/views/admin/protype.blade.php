@extends('admin.admin')
@section('content')
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tables</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row" style="display: block;">
              <div class="col-md-12 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Protype</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                      <li><a href="{{asset('admin/add-protype')}}" class="btn btn-primary float-end">Thêm loại</a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Type_name</th>
                          <th>Type_image</th>
                          <th>Delete</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                      @foreach ($protype as $row)
                      <tbody>
                        <tr>
                          <th scope="row">{{$row->type_id}}</th>
                          <td>{{$row->type_name}}</td>
                          <td><img src="../images/{{$row->type_image}}" width="200" height="200" class="img-fluid" alt="Image"></td>
                          <td><a href="{{asset('admin/delete-protype/'.$row->type_id)}}"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>
                          <td><a href="{{asset('admin/edit-protype/'.$row->type_id)}}"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
@endsection