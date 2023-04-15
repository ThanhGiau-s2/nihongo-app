@extends('client.layout_dn.master')
@section('content')
        <div class="container content">
            <div class="dd"><h3><a href="">Trang chủ</a> >> <a href="">Danh sách bài học</a> >><a href=""> Bài {{$id}} </a>>>Kiểm tra ngữ pháp</h3></div>
            <section>
                <div class="row batdau">
                    <div class="col-md-1 col-md-offset-3 btn-batdau" id="">
                        <a href="batdaukiemtranguphap/{{$id}}/{{Auth::user()->id}}" class="btn btn-add btn-primary">Bắt đầu</a>
                    </div>
                </div>
                <div class="row pb400">
                    <div class="col-md-8 col-8 ctbh">                        
                    </div>
@endsection