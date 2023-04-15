@extends('admin.layout.master')
@section('content')
<div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Trang chủ</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Trang chủ</li>
                    </ol>                    
                </div>            
            </div>
        </div>
        <div class="container">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col mr-auto">
                                <h2 class="header-text">Danh sách bài học</h2>
                            </div>
                            <div class="col-sm-1" id="header-btn-add">
                                <a href="admin/bai/add" type="" class="btn btn-add btn-primary">Thêm</a>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="container">
                            <div class="row">
                            <div class="col-md-12">                            
                                <a href="admin/bai/downloadExcelSample"><button class="btn btn-success">Tải tập tin mẫu</button></a>                   
                            </div>
                            </div>
                            <form style="margin-top: 15px;margin-bottom:20px;" action="admin/bai/importExcel" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input type="file" name="import_file"/>
                                <button class="btn btn-primary">Nhập tập tin</button>
                            </form>
                        </div>
                            <div class="row">
                                <div class="col-sm-12">
                                @if(session('thongbao'))
                                    <div class="alert alert-success">
                                        {{session('thongbao')}}
                                    </div>
                                @endif
                                    <table class="table table-striped table-bordered table-hover" id="database">
                                        <thead>                                               
                                            <tr>
                                                <th>#</th>                                                                                    
                                                <th>Tên</th>
                                                <th>Ngày tạo</th>   
                                                <th>Ngày cập nhật</th>                                                      
                                                <th></th>
                                            </tr>                                              
                                        </thead>
                                        <tbody>   
                                        @foreach ($bais as $b)                                     
                                            <tr class="odd gradeX">
                                                <td class="center">{{$b->id}}</td>
                                                <td class="center">{{$b->ten}}</td>                                                    
                                                <td class="center">{{$b->created_at}}</td> 
                                                <td class="center">{{$b->updated_at}}</td>                                                                                                      
                                                <td>
                                                    <a href="admin/bai/edit/{{$b->id}}"><i class="fa fa-edit text-success"></i></a>
                                                </td>
                                            </tr>   
                                        @endforeach                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </div><!-- /#right-panel -->
@endsection