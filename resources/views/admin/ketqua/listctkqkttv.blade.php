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
                                <h2 class="header-text">Danh sách chi tiết kết quả kiểm tra từ vựng</h2>
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
                                <table class="table table-striped table-bordered table-hover" id="database">
                                        <thead>                                               
                                            <tr>
                                                <th>#</th>                                                                                    
                                                <th>Id kết quả</th>
                                                <th>Id câu hỏi</th>
                                                <th>Lựa chọn</th>   
                                                <th>Kết quả</th>   
                                                <th></th>
                                            </tr>                                              
                                        </thead>
                                        <tbody>   
                                        <?php $i =1;?>   
                                        @foreach ($kqkttv as $b)                                     
                                            <tr class="odd gradeX">
                                                <td class="center">{{$i++}}</td>
                                                <td class="center">{{$b->id_kq}}</td>                                                    
                                                <td class="center">{{$b->id_ch}}</td>      
                                                <td class="center">{{$b->luachon}}</td>    
                                                <td class="center">{{$b->ketqua}}</td>                                                                                         
                                                <td>
                                                    <form method="get" action="admin/ctketqua/deletekqkttv/{{$b->id}}" accept-charset="UTF-8" style="display:inline">
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