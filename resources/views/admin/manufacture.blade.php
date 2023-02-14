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
                    <h2>Manufacture</h2>
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
                      <li><a href="{{asset('admin/add-manufacture')}}" class="btn btn-primary float-end">Thêm hãng</a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Manufacture_name</th>
                          <th>Delete</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                      @foreach ($manufacture as $row)
                      <tbody>
                        <tr>
                          <th scope="row">{{$row->manu_id}}</th>
                          <td>{{$row->manu_name}}</td>
                          <td><a href="{{asset('admin/delete-manufacture/'.$row->manu_id)}}"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>
                          <td><a href="{{asset('admin/edit-manufacture/'.$row->manu_id)}}"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
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