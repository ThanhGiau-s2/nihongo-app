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
                <div class="card-header">
                    <div class="row">
                        <div class="col mr-auto">
                            <h2 class="header-text">Trang cá nhân</h2>
                        </div>
                    </div>                    
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form style="margin-top:40px;" action="/ad/suatt/{{Auth::guard('nhanvien')->user()->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>              
                        
                        <div class="form-group row" >
                            <label for="" class="col-sm-2 col-form-label">Họ tên </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ten" value="{{Auth::guard('nhanvien')->user()->ten}}" placeholder="Họ tên"/>
                            </div>
                        </div>
                        <div class="form-group row" >
                            <label for="" class="col-sm-2 col-form-label">Ngày sinh </label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="ngaysinh" value="{{Auth::guard('nhanvien')->user()->ngaysinh}}" placeholder="Họ tên"/>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Giới tính:</label>
                            <div class="col-sm-10" id="radio-groups">
                                <input class="gioitinh" type="radio" name="gioitinh" value="1"
                                @if (Auth::guard('nhanvien')->user()->gioitinh==1)
                                    checked="true"
                                @endif>Nam
                                <input class="gioitinh" type="radio" name="gioitinh" value="0"
                                @if (Auth::guard('nhanvien')->user()->gioitinh==0)
                                    checked="true"
                                @endif>Nữ
                            </div>
                        </div>
                        <div class="form-group row" >
                            <label for="" class="col-sm-2 col-form-label">Email:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" value="{{Auth::guard('nhanvien')->user()->email}}" readonly/>
                            </div>
                        </div>             
                        <div class="form-group row">
                            <div class="col-sm-2">                 
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                            <div class="col-sm-2">                 
                                <a class="btn btn-success" href="ad/doimk/{{Auth::guard('nhanvien')->user()->id}}">Đổi mật khẩu</a>
                            </div>
                            <div class="col-sm-2">                 
                                <a class="btn btn-success" href="/ad/dashboard">Trở về</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>            
    </div><!-- /#right-panel -->
@endsection