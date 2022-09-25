@extends('client.layout_dn.master')
@section('content') 
        <div class="container content">
            <div class="dd"><h3><a href="/index_dangnhap/{{Auth::user()->id}}">Trang chủ</a> >> <a href="/index_dangnhap/{{Auth::user()->id}}">Danh sách bài học</a> >><a href="baidn/{{$id}}/{{Auth::user()->id}}"> Bài {{$id}} </a> >>Đọc văn mẫu</h3></div>
            <section>
                <div class="row">
                    <div class="col-md-8 col-8 ctbh">
                    @foreach ($dvm as $d)  
                            <div class="">
                                <audio controls style="width: 400px;">
                                    <source src="upload/docvanmau/{{$d->mp3docvanmau}}" type="audio/mpeg">
                                </audio>    
                            </div>  
                        @endforeach
                            <?php $i=1;?>
                        <div class="docvanmau">
                            @foreach($dvmha as $dvm)
                                <p>Câu {{$i++}}:{{$dvm->noidung}}</p>
                            @endforeach
                        </div>
                    <div class="row">
                        <div class="col-md-1 col-md-offset-5 btn-hoanthanh" id="">
                            <a href="capnhatluyendoc/{{$id}}/{{Auth::user()->id}}" class="btn btn-add btn-primary">Hoàn thành</a>
                        </div>
                    </div>
                    </div>
@endsection                   
               
            