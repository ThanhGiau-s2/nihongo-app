@extends('client.layout_dn.master')
@section('content') 
        <div class="container content">
            <div class="dd">
                <h3><a href="/index_dangnhap/{{Auth::user()->id}}">Trang chủ</a> >> <a href="baidn/{{$id}}/{{Auth::user()->id}}">Bài {{$id}} </a>>> Chi tiết bài học</h3>
            </div>
            <section>
                <div class="row">
                    <div class="col-md-8 col-8 ctbh">
                        @foreach($lh1 as $l1)
                            <div class="row">
                                @if($l1->tuvung==1)
                                    <a href="/tuvungdn/{{Auth::user()->id}}/{{$id}}" class="col-md-5 ndhocroi tv">
                                    <img src="client/assets/images/tuvung.png" alt=""/>
                                    <span>Từ vựng</span>
                                    </a>
                                @else
                                    <a href="/tuvungdn/{{Auth::user()->id}}/{{$id}}" class="col-md-5 nd tv">
                                    <img src="client/assets/images/tuvung.png" alt=""/>
                                        <span>Từ vựng</span>
                                    </a>
                                @endif
                                @if($l1->nguphap==1)
                                    <a href="nguphapdn/{{Auth::user()->id}}/{{$id}}" class="col-md-5 ndhocroi np">
                                    <img src="client/assets/images/nguphap.jpg" alt=""/>
                                        <span>Ngữ pháp</span>
                                    </a>
                                @else
                                    <a href="nguphapdn/{{Auth::user()->id}}/{{$id}}" class="col-md-5 nd np">
                                    <img src="client/assets/images/nguphap.jpg" alt=""/>
                                        <span>Ngữ pháp</span>
                                    </a>
                                @endif
                            </div>
                            <div class="row">
                                @if($l1->luyendoc==1)
                                    <a href="luyendocdn/{{Auth::user()->id}}/{{$id}}" class="col-md-5 ndhocroi ld">
                                    <img src="client/assets/images/luyendoc.jpg" alt=""/>
                                        <span>Luyện đọc</span>
                                    </a>
                                @else
                                    <a href="luyendocdn/{{Auth::user()->id}}/{{$id}}" class="col-md-5 nd ld">
                                    <img src="client/assets/images/luyendoc.jpg" alt=""/>
                                        <span>Luyện đọc</span>
                                    </a>
                                @endif
                                @if($l1->hoithoai==1)
                                    <a href="hoithoaidn/{{Auth::user()->id}}/{{$id}}" class="col-md-5 ndhocroi ht">
                                    <img src="client/assets/images/hoithoai.jpg" alt=""/>
                                        <span>Hội thoại</span>
                                    </a>
                                @else
                                    <a href="hoithoaidn/{{Auth::user()->id}}/{{$id}}" class="col-md-5 nd ht">
                                    <img src="client/assets/images/hoithoai.jpg" alt=""/>
                                        <span>Hội thoại</span>
                                    </a>
                                @endif                            
                            </div>
                            <div class="row">
                                @if($l1->baitap==1)
                                    <a href="baitap/{{Auth::user()->id}}/{{$id}}" class="col-md-5 ndhocroi bt">
                                    <img src="client/assets/images/baitap.jpg" alt=""/>
                                        <span>Bài tập</span>
                                    </a>
                                @else
                                    <a href="baitap/{{Auth::user()->id}}/{{$id}}" class="col-md-5 nd bt">
                                    <img src="client/assets/images/baitap.jpg" alt=""/>
                                        <span>Bài tập</span>
                                    </a>
                                @endif
                                @if($l1->luyennghe==1)
                                    <a href="luyennghedn/{{Auth::user()->id}}/{{$id}}" class="col-md-5 ndhocroi ln">
                                    <img src="client/assets/images/luyennghe.jpg" alt=""/>
                                        <span>Luyện nghe</span>
                                    </a>
                                @else
                                    <a href="luyennghedn/{{Auth::user()->id}}/{{$id}}" class="col-md-5 nd ln">
                                    <img src="client/assets/images/luyennghe.jpg" alt=""/>
                                        <span>Luyện nghe</span>
                                    </a>
                                @endif                          
                            </div>
                            <div class="row">
                            @if($l1->luyennghe==1&&$l1->luyendoc==1&&$l1->tuvung==1&&$l1->nguphap==1&&$l1->baitap==1&&$l1->hoithoai==1)
                                <a href="kiemtra/{{$id}}/{{Auth::user()->id}}" class="col-md-5 nd kt">
                                <img src="client/assets/images/ketqua.jpg" alt=""/>
                                    <span>Kiểm tra</span>
                                </a>
                            @endif
                            </div>
                        @endforeach
                    </div>                   
            @endsection