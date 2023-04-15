@extends('client.layout_dn.master')
@section('content')
<div class="container content">
<div class="row">
    <div class="col-md-8 col-xs-8 dsbh_p1">
        <div class="dd"><h3><a href="">Trang chủ</a> >> Danh sách bảng chữ cái </h3></div>
        <h3>Danh sách bảng chữ cái</h3>
        <ul>
            <li><a href="/hiragana_dn/{{Auth::user()->id}}">Hiragana</a></li>
            <li><a href="/katakana_dn/{{Auth::user()->id}}">Katakana</a></li>
            <li><a href="/hiraganaluyentap_dn/{{Auth::user()->id}}">Hiragana luyện tập</a></li>
            <li><a href="/katakanaluyentap_dn/{{Auth::user()->id}}">Katakana luyện tập</a></li>
        </ul>
    </div>
@endsection