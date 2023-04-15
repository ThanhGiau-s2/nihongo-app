@extends('client.layout_dn.master')
@section('content')
<div class="container content">
    <div class="dd">
        <h3><a href="/index_dangnhap/{{Auth::user()->id}}">Trang chủ</a> >> <a href="/index_dangnhap/{{Auth::user()->id}}">Danh sách bài học</a> >><a href=""> Bài {{$id}} </a>>>Bài tập</h3>
    </div>
    <section>
        <div class="row">
            <div class="col-md-8 col-8 ctbh">
                <h2>Bài tập 1: Nghe và ghi câu trả lời</h2>
                <div class="row">
                    <div class="col-md-9 col-md-offset-1">
                        <form>
                        @foreach ($ht as $ht)  
                        <audio controls style="width: 400px;">
                            <source src="upload/btn1/{{$ht->mp3btn1}}" type="audio/mpeg">
                        </audio>
                        @endforeach
                        <?php $i=1; ?>                               
                            @if($id==1)
                            <p>Ví dụ</p>    
                            <p>あなたは　せんせいですか。</p>                                
                            @endif                               
                        @foreach ($ctbt1 as $ctb1)                                   
                            <p>Câu {{$i++}}</p>
                            <input type="text" id="cautraloi"/>
                            <div class="loinhapctl">
                                <p class="btnhtda">Vui lòng nhập câu trả lời</p>
                            </div> 
                            <div class="hienthidapan">
                                <p class="btnhtda"><<Đáp án>></p>
                                <div class="ndda">
                                    <p>{{$ctb1->noidung}}</p>
                                </div>
                            </div>                                   
                        @endforeach
                        </form> 
                    </div>
                </div>
                <h2>Bài tập 2: Nghe và chọn câu đúng câu sai</h2>                
                <div class="row">
                    <div class="col-md-9 col-md-offset-1">
                        <form name="ch2" id="ch2">
                        @foreach ($ht1 as $ht1)  
                        <audio controls style="width: 400px;">
                            <source src="upload/btn2/{{$ht1->mp3btn2}}" type="audio/mpeg">
                        </audio>
                        @endforeach
                            <?php $i=1; ?>
                            @foreach ($ctbt2 as $ctb2)
                                <p>Câu {{$i++}}</p>
                                <input type="radio" name="{{$i++}}" value="dung"id="ctl"> Đúng<br>
                                <input type="radio" name="{{$i++}}" value="sai" id="ctl"> Sai<br>
                                <div class="loinhapctlrd">
                                    <p class="btnhtda">Vui lòng chọn câu trả lời</p>
                                </div>  
                                <div class="hienthidapan">
                                    <p class="btnhtda"><<Đáp án>></p>
                                    <div class="ndda">
                                    <p><?php echo $ctb2->noidung?></p>
                                    </div>
                                </div>
                            @endforeach
                        </form> 
                    </div>
                </div>                
                <div class="row nopbai">
                    <div class="col-md-1 col-md-offset-5 btn-nopbai" id="">
                        <button class="btn btn-add btn-primary">Nộp bài</button>
                    </div>
                </div>
                <div class="row hoanthanh">
                    <div class="col-md-1 col-md-offset-5 btn-hoanthanh" id="">
                        <a href="capnhatbaitap/{{$id}}/{{Auth::user()->id}}" class="btn btn-add btn-primary">Hoàn thành</a>
                    </div>
                </div>
            </div>
@endsection