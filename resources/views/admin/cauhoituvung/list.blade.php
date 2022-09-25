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
                                <h2 class="header-text">Danh sách câu hỏi từ vựng</h2>
                            </div>
                            <div class="col-sm-1" id="header-btn-add">
                                <a href="admin/cauhoituvung/add" type="" class="btn btn-add btn-primary">Thêm</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="admin/cauhoituvung/downloadExcelSample"><button class="btn btn-success">Tải tập tin mẫu</button></a>                   
                                    </div>
                                </div>
                                <form style="margin-top: 15px;margin-bottom:20px;" action="admin/cauhoituvung/importExcel" class="form-horizontal" method="post" enctype="multipart/form-data">
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
                                                <th>Nội dung</th>
                                                <th>Đáp án 1</th>
                                                <th>Đáp án 2</th>
                                                <th>Đáp án 3</th>
                                                <th>Đáp án 4</th>
                                                <th>Đáp án đúng</th>
                                                <th></th>
                                            </tr>                                              
                                        </thead>
                                        <tbody>   
                                        @foreach ($cauhoituvungs as $ch)                                     
                                            <tr class="odd gradeX">
                                                <td class="center">{{$ch->id}}</td>
                                                <td class="center">{{$ch->id_bai}}</td> 
                                                <td class="center">
                                                <audio controls style="width: 150px;">
                                                    <source src="upload/chtv/{{$ch->noidung}}" type="audio/mpeg">
                                                </audio>
                                                </td> 
                                                <td class="center">{{$ch->dapan1}}</td>   
                                                <td class="center">{{$ch->dapan2}}</td>   
                                                <td class="center">{{$ch->dapan3}}</td>   
                                                <td class="center">{{$ch->dapan4}}</td>   
                                                <td class="center">{{$ch->dapandung}}</td>                                                        
                                                <td class="center">
                                                <a href="admin/cauhoituvung/edit/{{$ch->id}}"><i class="fa fa-edit text-success"></i></a>
                                                    <form method="get" action="admin/cauhoituvung/delete/{{$ch->id}}" accept-charset="UTF-8" style="display:inline">
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