@extends('client.layout_dn.master')
@section('content')
        <div class="container content">
            <div class="dd"><h3><a href="/index_dangnhap/{{Auth::user()->id}}">Trang chủ</a> >> <a href="/index_dangnhap/{{Auth::user()->id}}">Danh sách bài học</a> >><a href="baidn/{{$id}}/{{Auth::user()->id}}"> Bài {{$id}} </a>>>Kiểm tra</h3></div>
            <section>
                <div class="row">
                    <div class="col-md-1 col-md-offset-3 btn-batdau" id="">
                        <a href="batdaukiemtra/{{$id}}/{{Auth::user()->id}}" class="btn btn-add btn-primary">Bắt đầu</a>
                    </div>
                </div>
                <div class="row pb400">
                    <div class="col-md-8 col-8 ctbh">
                    </div>
@endsection                   
               
            
      