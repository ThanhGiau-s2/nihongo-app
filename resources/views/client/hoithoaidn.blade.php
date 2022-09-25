@extends('client.layout_dn.master')
@section('content')
        <div class="container content">
            <div class="dd"><h3><a href="/index_dangnhap/{{Auth::user()->id}}">Trang chủ</a> >> <a href="/dsbhdn/{{Auth::user()->id}}">Danh sách bài học</a> >><a href="baidn/{{$id}}/{{Auth::user()->id}}"> Bài {{$id}} </a>>>Hội thoại</h3></div>
            <section>
                <div class="row">
                    <div class="col-md-8 col-8 ctbh">
                        @foreach ($ht as $ht)  
                            <div class="tieude_ht">
                                <h2>{{$ht->tieude}}</h2>
                            </div>
                            <div class="hinhdaidien">
                                <img width="500px" height="300px" src="upload/hoithoai/{{$ht->hinhdaidien}}"/>
                            </div>
                            <div class="audio">
                                <audio controls style="width: 300px;">
                                    <source src="upload/hoithoai/{{$ht->mp3}}" type="audio/mpeg">
                                </audio>    
                            </div>
                            <div class="">
                                <?php echo $ht->noidung?>
                            </div>  
                        @endforeach
                        <div class="row">
                        <div class="col-md-1 col-md-offset-5 btn-hoanthanh" id="">
                            <a href="capnhathoithoai/{{$id}}/{{Auth::user()->id}}" class="btn btn-add btn-primary">Hoàn thành</a>
                        </div>
                    </div>
                    </div>
@endsection
               
            
       