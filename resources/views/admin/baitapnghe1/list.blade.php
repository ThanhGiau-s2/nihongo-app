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
                                <h2 class="header-text">Danh sách bài tập nghe 1</h2>
                            </div>
                            <div class="col-sm-1" id="header-btn-add">
                                <a href="admin/btn1/add" type="" class="btn btn-add btn-primary">Thêm</a>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="container">
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
                                                <th>Bài</th>                                                               
                                                <th>Hình</th>
                                                <th>Mp3</th>
                                                <th>Ngày tạo</th>   
                                                <th>Ngày cập nhật</th>                                                      
                                                <th></th>
                                            </tr>                                              
                                        </thead>
                                        <tbody>   
                                        @foreach ($btn1 as $b1)                                     
                                            <tr class="odd gradeX">
                                                <td class="center">{{$b1->id}}</td>
                                                <td class="center">{{$b1->id_bai}}</td> 
                                                <td class="center"><img width="100px" height="100px" src="upload/btn1/{{$b1->hinhdaidien}}"/></td>     
                                                <td class="center"><audio controls style="width: 200px;">
                                                        <source src="upload/btn1/{{$b1->mp3}}" type="audio/mpeg">
                                                    </audio></td>                                                    
                                                <td class="center">{{$b1->created_at}}</td> 
                                                <td class="center">{{$b1->updated_at}}</td>                                                                                                      
                                                <td>
                                                    <a href="admin/btn1/edit/{{$b1->id}}"><i class="fa fa-edit text-success"></i></a>
                                                    <form method="get" action="admin/luyennghe/delete/{{$b1->id}}" accept-charset="UTF-8" style="display:inline">
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