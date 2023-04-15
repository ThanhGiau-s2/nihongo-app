@extends('admin.layout.master')
@section('content')
<div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                   
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        
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
                                <h2 class="header-text">Danh sách hội thoại</h2>
                            </div>
                            <div class="col-sm-1" id="header-btn-add">
                                <a href="admin/hoithoai/add" type="" class="btn btn-add btn-primary">Thêm</a>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="container">
                            <div class="row">
                            <div class="col-md-12">                            
                                <a href="admin/hoithoai/downloadExcelSample"><button class="btn btn-success">Tải tập tin mẫu</button></a>                   
                            </div>
                            </div>
                            <form style="margin-top: 15px;margin-bottom:20px;" action="admin/hoithoai/importExcel" class="form-horizontal" method="post" enctype="multipart/form-data">
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
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>                                               
                                            <tr>
                                                <th>#</th>    
                                                <th>Bài</th>                                                                                
                                                <th>Hình đại diện</th>
                                                <th>Tiêu đề</th>
                                                <th>Mp3</th>
                                                <th>Nội dung</th>
                                                <th></th>
                                            </tr>                                              
                                        </thead>
                                        <tbody>   
                                        @foreach ($hoithoais as $t)                                     
                                            <tr class="odd gradeX">
                                                <td class="center">{{$t->id}}</td>
                                                <td class="center">{{$t->id_bai}}</td>
                                                <td class="center">
                                                    <img width="100px" height="100px" src="upload/hoithoai/{{$t->hinhdaidien}}"/>
                                                </td>      
                                                <td class="center">{{$t->tieude}}</td>  
                                                <td class="center">
                                                    <audio controls style="width: 200px;">
                                                        <source src="upload/hoithoai/{{$t->mp3}}" type="audio/mpeg">
                                                    </audio>
                                                </td>      
                                                <td class="center"><?php echo $t->noidung?></td>
                                                <td class="center">
                                                    <a href="admin/hoithoai/edit/{{$t->id}}"><i class="fa fa-edit text-success"></i></a>
                                                    <form method="get" action="admin/hoithoai/delete/{{$t->id}}" accept-charset="UTF-8" style="display:inline">
                                                        <a data-toggle="modal" data-target="#confirmDelete" data-title="Confirm delete" data-message="Bạn có muốn xóa không?">
                                                            <i class="fa fa-remove text-danger"></i>
                                                        </a>
                                                    </form>                                                         
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
    @include('admin.delete_confirm')
@endsection