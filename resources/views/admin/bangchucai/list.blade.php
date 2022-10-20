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
                                <h2 class="header-text">Danh sách bảng chữ cái</h2>
                            </div>
                            <div class="col-sm-1" id="header-btn-add">
                                <a href="admin/bangchucai/add" type="" class="btn btn-add btn-primary">Thêm</a>
                            </div>
                        </div>
                        <div class="card-body">
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
                                                <th>Tên</th>                                                                                
                                                <th>Hình</th>                                  
                                                <th></th>
                                            </tr>                                              
                                        </thead>
                                        <tbody>   
                                        @foreach ($bccs as $bcc)                                     
                                            <tr class="odd gradeX">
                                                <td class="center">{{$bcc->id}}</td>
                                                <td class="center">{{$bcc->ten}}</td>
                                                <td class="center">
                                                    <img width="100px" height="100px" src="upload/bangchucai/{{$bcc->hinh}}"/>
                                                </td>                                                                                          
                                                <td>
                                                    <a href="admin/bangchucai/edit/{{$bcc->id}}"><i class="fa fa-edit text-success"></i></a>
                                                    <form method="get" action="admin/bangchucai/delete/{{$bcc->id}}" accept-charset="UTF-8" style="display:inline">
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