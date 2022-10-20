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
                                <h2 class="header-text">Danh sách nhân viên</h2>
                            </div>
                            <div class="col-sm-1" id="header-btn-add">
                                <a href="admin/nhanvien/add" type="" class="btn btn-add btn-primary">Thêm</a>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="container">
                            <div class="row">
                            <div class="col-md-12">
                                <!-- <a href="admin/parts/downloadExcel/xls"><button class="btn btn-success">Download Excel xls</button></a>
                                <a href="admin/parts/downloadExcel/xlsx"><button class="btn btn-success">Download Excel xlsx</button></a>
                                <a href="admin/parts/downloadExcel/csv"><button class="btn btn-success">Download CSV</button></a> -->
                                <a href="admin/parts/downloadExcelSample"><button class="btn btn-success">Tải tập tin mẫu</button></a>                   
                            </div>
                            </div>
                            <form style="margin-top: 15px;margin-bottom:20px;" action="admin/nhanvien/importExcel" class="form-horizontal" method="post" enctype="multipart/form-data">
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
                                                <th>Ngày sinh</th>   
                                                <th>Giới tính</th>                                
                                                <th>Email</th>                                        
                                                <th>Hoạt động</th>     
                                                <th>Quyền</th>                                       
                                                <th></th>
                                            </tr>                                              
                                        </thead>
                                        <tbody>   
                                        @foreach ($nhanviens as $nv)                                     
                                            <tr class="odd gradeX">
                                                <td class="center">{{$nv->id}}</td>                                       
                                                <td class="center">{{$nv->ten}}</td>
                                                <td class="center">{{$nv->ngaysinh}}</td>
                                                
                                                @if($nv->gioitinh==1)
                                                <td>Nam</td>
                                                @else
                                                <td>Nữ</td>
                                                @endif
                                                <td class="center">{{$nv->email}}</td>                                      
                                                
                                                @if($nv->hoatdong==1)
                                                <td>Hoạt động</td>
                                                @else
                                                <td>Không hoạt động</td>
                                                @endif 
                                                <td class="center">{{$nv->quyen}}</td>                                                                                                         
                                                <td>
                                                    <a href="admin/nhanvien/edit/{{$nv->id}}"><i class="fa fa-edit text-success"></i></a>
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