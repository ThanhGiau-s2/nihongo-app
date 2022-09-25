@extends('client.layout_dn.master')
@section('content')  
<div class="container content">    
    <div class="dd"><h3><a href="">Trang chủ</a> >> <a href="">Danh sách bài học</a> >><a href=""> Bài {{$id}} </a>>>Kết quả kiểm tra từ vựng</h3></div>        
        <section>                
            <div class="row pb400">
                <div class="col-md-8 col-8 ctbh">
                    <div class="">                      
                        <h2>Câu đúng:{{$sl}}/6</h2>                     
                    </div>
                    <div class="row">
                        <div class="col-md-1 col-md-offset-5 btn-hoanthanh" id="">
                            <a href="capnhattuvung/1/{{Auth::user()->id}}" class="btn btn-add btn-primary">Hoàn thành</a>
                        </div>
                    </div>
                </div>
@endsection            
       