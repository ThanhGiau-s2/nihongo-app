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
        </div>
    </div>
    <div class="container">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col mr-auto">
                            <h2 class="header-text">Danh sách mp3</h2>
                        </div>
                        <div class="col-sm-1" id="header-btn-add">
                            <a href="admin/danhsachmp3/add" type="" class="btn btn-add btn-primary">Thêm</a>
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
                                            <th>Bài</th>
                                            <th>Từ vựng</th>
                                            <th>Đọc văn mẫu</th>
                                            <th>Bài tập nghe 1</th>
                                            <th>Bài tập nghe 2</th>                                                       
                                            <th></th>
                                        </tr>                                              
                                    </thead>
                                    <tbody>   
                                    @foreach ($dsmp3s as $l)                                     
                                        <tr class="odd gradeX">
                                            <td class="center">{{$l->id}}</td>
                                            <td class="center">{{$l->id_bai}}</td> 
                                            <td class="center">
                                                <audio controls style="width: 150px;">
                                                    <source src="upload/tuvung/{{$l->mp3tuvung}}" type="audio/mpeg">
                                                </audio>
                                            </td>    
                                            <td class="center">
                                                <audio controls style="width: 150px;">
                                                    <source src="upload/docvanmau/{{$l->mp3docvanmau}}" type="audio/mpeg">
                                                </audio>
                                            </td>     
                                            <td class="center">
                                                <audio controls style="width: 150px;">
                                                    <source src="upload/btn1/{{$l->mp3btn1}}" type="audio/mpeg">
                                                </audio>
                                            </td>   
                                            <td class="center">
                                                <audio controls style="width: 150px;">
                                                    <source src="upload/btn2/{{$l->mp3btn2}}" type="audio/mpeg">
                                                </audio>
                                            </td>                                                                                                                                                                                    
                                            <td>
                                                <a href="admin/danhsachmp3/edit/{{$l->id}}"><i class="fa fa-edit text-success"></i></a>
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
@endsection