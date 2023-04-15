@extends('client.layout_dn.master')
@section('content')   
        <div class="container content">
            <div class="dd"><h3><a href="/index_dangnhap/{{Auth::user()->id}}">Trang chủ</a> >> <a href="/index_dangnhap/{{Auth::user()->id}}">Danh sách bài học</a> >><a href="baidn/{{$id}}/{{Auth::user()->id}}"> Bài {{$id}} </a>>>Luyện nghe</h3></div>
            <section>
                <div class="row">
                    <div class="col-md-8 col-8 ctbh">
                        @foreach ($ln as $ln)  
                            <h3>Câu:{{$ln->cau}}</h3>
                            <div class="">
                                <audio controls style="width: 300px;">
                                    <source src="upload/luyennghe/{{$ln->mp3}}" type="audio/mpeg">
                                </audio>    
                            </div> 
                            <div class="hinhbainghe">
                                <img src="upload/luyennghe/{{$ln->hinh}}"/>
                            </div>                            
                        @endforeach
                        <div class="row">
                            <div class="col-md-1 col-md-offset-5 btn-hoanthanh" id="">
                                <a href="capnhatluyennghe/{{$id}}/{{Auth::user()->id}}" class="btn btn-add btn-primary">Hoàn thành</a>
                            </div>
                        </div>
                    </div>
@endsection