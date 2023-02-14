@extends('admin.admin')
@section('content')
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tables <small>Some examples to get you started</small></h3>
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
                    <h2>Product <small>Bordered table subtitle</small></h2>
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
                      <li><a href="{{asset('admin/add-product')}}" class="btn btn-primary float-end">Thêm sản phẩm</a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Com_id</th>
                          <th>Com_name</th>
                          <th>Com_email</th>
                          <th>Com_content</th>
                          <th>Com_product</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      @foreach ($comments as $row)
                      <tbody>
                        <tr>
                          <th scope="row">{{$row->com_id}}</th>
                          <td>{{$row->com_name}}</td>
                          <td>{{$row->com_email}}</td>
                          <td>{{$row->com_content}}</td>
                          <td>{{$row->com_product}}</td>
                          <td><a href="{{asset('admin/delete-comment/'.$row->com_id)}}"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>
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