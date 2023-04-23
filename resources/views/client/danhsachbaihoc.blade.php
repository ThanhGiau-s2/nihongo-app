@extends('client.layout.master')
@section('content')
<div class="row">
    <div class="col-md-8 col-xs-12 dsbh_p1">
    <div class="dd"><h3><a href="">Trang chủ</a> >> <a href="dsbh">Danh sách bài học</a> </h3></div>
        <h3>Danh sách bài học</h3>
        <ul>
            @foreach($tenbh as $tbh)
                <li><a href="bai/{{$tbh->id}}"><b>Bài {{$tbh->id}}:</b> {{$tbh->tieude}}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
