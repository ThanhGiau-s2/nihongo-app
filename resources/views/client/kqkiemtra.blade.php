@extends('client.layout_dn.master')
@section('content')   
<div class="container content">            
    <section>                
        <div class="row pb400">
        <div class="dd"><h3><a href="">Trang chủ</a> >> <a href="">Danh sách bài học</a> >><a href=""> Bài {{$bai}} </a>>>Kết quả kiểm tra </h3></div>
            <div class="col-md-8 col-8 ctbh">
                <div class="text-center">                       
                    <h2>Câu đúng:{{$sl}}</h2>                       
                </div>
                <div class="linkbai">
                @if($baicu!=1)
                <a href="baidn/{{$baicu}}/{{Auth::user()->id}}">Bài cũ_Bài {{$baicu}}</a>
                @endif
                <a href="baidn/{{$bai}}/{{Auth::user()->id}}">Học lại_Bài {{$bai}}</a>
                @if($baimoi>$bai)
                <a href="baidn/{{$baimoi}}/{{Auth::user()->id}}">Bài mới_Bài {{$baimoi}}</a>
                @endif                
                </div>
                <div class="row text-center">                       
                    <a href="danglendiendan/{{$id_kq}}" class="btn btn-primary">Đăng lên diễn đàn</a>              
                </div>
            </div>
@endsection                  
              
        