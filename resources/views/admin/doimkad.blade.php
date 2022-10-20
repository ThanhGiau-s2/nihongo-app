@extends('admin.layout.master')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1><a href = "/ad/trangcanhan">Trang cá nhân</a>>> <span>Đổi mật khẩu</h1>
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
                            <h2 class="header-text">Đổi mật khẩu</h2>
                        </div>
                    </div>                    
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                        <form style="margin-top:40px;" action="/ad/doimk/{{Auth::guard('nhanvien')->user()->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>            
                            <div class="form-group row" >
                                <label for="" class="col-sm-2 col-form-label">Mật khẩu cũ </label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="old_pw" value="" placeholder="Mật khẩu cũ"/>
                                </div>
                            </div>
                            <div class="form-group row" >
                                <label for="" class="col-sm-2 col-form-label">Mật khẩu mới:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="new_pw" value="" placeholder="Mật khẩu mới"/>
                                </div>
                            </div>
                            <div class="form-group row" >
                                <label for="" class="col-sm-2 col-form-label">Nhập lại mật khẩu mới:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="new_pw_confirmation" placeholder="Nhập lại mật khẩu mới">
                                </div>
                            </div>                
                            <div class="form-group row">
                                <div class="col-sm-2">                 
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                                <div class="col-sm-2">                 
                                    <a class="btn btn-success" href="/ad/trangcanhan">Trở về</a>
                                </div>
                            </div>
                        </form>
                        </div>
            </div>
        </div>            
    </div><!-- /#right-panel -->
@endsection