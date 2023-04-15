@extends('client.layout_dn.master')
@section('content')
<div class="container content">
    <div class="dd"><h3><a href="/index_dangnhap/{{Auth::user()->id}}">Trang chủ</a> >> Danh sách bài học</h3></div>
    <section>
        <div class="row pb400">
            <div class="col-md-8 col-8 ctbh">
                <h3>Danh sách bài học</h3>
                <ul>
                    @foreach($tenbh as $tbh)
                        <li><a href="baidn/{{$tbh->id}}/{{Auth::user()->id}}"><b>Bài{{$tbh->id}}:</b> {{$tbh->tieude}}</a></li>
                    @endforeach
                </ul>
            </div>
@endsection

   
        
                
