@extends('client.layout_dn.master')
@section('content')  
        <div class="container content">
            <div class="dd"><h3><a href="/index_dangnhap/{{Auth::user()->id}}">Trang chủ</a> >> <a href="/dsbhdn/{{Auth::user()->id}}">Danh sách bài học</a> >><a href="baidn/{{$id}}/{{Auth::user()->id}}"> Bài {{$id}} </a>>>Ngữ pháp</h3></div>
            <section>
                <div class="row">
                    <div class="col-md-8 col-8 ctbh">
                        @foreach ($np as $n)          
                            <div class="tieudenguphap">
                                <h2>{{$n->tieude}}</h2>
                            </div>
                            <div class="">
                                <?php echo $n->noidung;?>
                            </div>
                        @endforeach
                    <div class="row">
                        <div class="col-md-1 col-md-offset-5 btn-hoanthanh" id="">
                            <a href="kiemtranp/{{$id}}" class="btn btn-add btn-primary">Làm bài tập</a>
                        </div>
                    </div>
                    </div>
@endsection                   
      