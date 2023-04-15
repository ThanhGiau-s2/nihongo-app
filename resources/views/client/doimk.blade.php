@extends('client.layout_dn.master')
@section('content')   
        <div class="container content">
            <div class="dd">
                <h3><a href="">Trang chủ</a> >> Đổi mật khẩu</h3>
            </div>
            <section>
                <div class="row pb400">
                    <div class="col-md-8 col-8 ctbh">
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form style="margin-top:40px;" action="doimk/{{Auth::user()->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>              
                            
                            <div class="form-group row" >
                                <label for="" class="col-sm-2 col-form-label">Mật khẩu cũ </label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="old_pw" value="" placeholder="Mật khẩu cũ"/>
                                    @if ($errors->has('old_pw'))
                                    <span class="error">{{$errors->first('old_pw')}}</span>
                                @endif
                                </div>
                                
                            </div>
                            <div class="form-group row" >
                                <label for="" class="col-sm-2 col-form-label">Mật khẩu mới:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="new_pw" value="" placeholder="Mật khẩu mới"/>
                                    @if ($errors->has('new_pw'))
                                    <span class="error">{{$errors->first('new_pw')}}</span>
                                @endif
                                </div>
                               
                            </div>
                            <div class="form-group row" >
                                <label for="" class="col-sm-2 col-form-label">Nhập lại mật khẩu mới:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="new_pw_confirmation" placeholder="Nhập lại mật khẩu mới">
                                    @if ($errors->has('new_pw_confirmation'))
                                    <span class="error">{{$errors->first('new_pw_confirmation')}}</span>
                                @endif
                                </div>
                               
                            </div>                
                            <div class="form-group row">
                                <div class="col-sm-2">                 
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                                <div class="col-sm-2">                 
                                    <a class="btn btn-success" href="/index_dangnhap/{{Auth::user()->id}}">Trở về</a>
                                </div>
                            </div>
                        </form>
                    </div>                    
@endsection                
        
      