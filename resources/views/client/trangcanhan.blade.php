@extends('client.layout_dn.master')
@section('content')  
        <div class="container content">
            <div class="dd">
                <h3><a href="/index_dangnhap/{{Auth::user()->id}}">Trang chủ</a> >> Trang cá nhân</h3>
            </div>
            <section>
                <div class="row pb400">
                    <div class="col-md-8 col-8 ctbh">
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form style="margin-top:40px;" action="suatt/{{Auth::user()->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>              
                            
                            <div class="form-group row" >
                                <label for="" class="col-sm-2 col-form-label">Họ tên </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="ten" value="{{Auth::user()->name}}" placeholder="Họ tên"/>
                                </div>
                            </div>
                            <div class="form-group row" >
                                <label for="" class="col-sm-2 col-form-label">Email:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" readonly/>
                                </div>
                            </div>             
                            <div class="form-group row">
                                <div class="col-sm-2">                 
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                                <div class="col-sm-2">                 
                                    <a class="btn btn-success" href="/doimk/{{Auth::user()->id}}">Đổi mật khẩu</a>
                                </div>
                                <div class="col-sm-2">                 
                                    <a class="btn btn-success" href="/index_dangnhap/{{Auth::user()->id}}">Trở về</a>
                                </div>
                            </div>
                        </form>
                    </div>
@endsection                    
              
        
      