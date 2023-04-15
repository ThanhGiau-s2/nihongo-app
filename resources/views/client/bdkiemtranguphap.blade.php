<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Nihongo_Trang web học tiếng Nhật</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="{{asset('')}}"/>
        <link rel="stylesheet" href="client/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="client/assets/css/style.css">
        <link rel="stylesheet" href="client/assets/font-awesome-4.7.0/css/font-awesome.min.css">
        <script src="client/assets/js/jquery-2.1.1.min.js"></script>
        <script src="client/assets/js/bootstrap.min.js"></script>
        <script src="client/assets/js/main.js"></script>
    </head>
    <body onload="loadpage()" oncontextmenu="return false;">
        <div class="container canchinh gioithieu">
            <div class="row">
                <div class="col-md-2 logo"><a href="/"><img src="client/assets/images/nihongo.jpg"/></a></div>
                <div class="col-md-7"><marquee>Học tiếng Nhật đơn giản hơn cùng "Nihongo"</marquee></div>
                <div class="col-md-3">
                    <div class="contact">
                        <i class="fa fa-phone fa-3x" aria-hidden="true"></i> <span>0964 572 759</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container canchinh">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/index_dangnhap/{{Auth::user()->id}}">Nihongo</a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>              
                    <div class="collapse navbar-collapse" id="collapse"> 
                        <ul class="nav navbar-nav">
                            <li class=""><a href="/index_dangnhap/{{Auth::user()->id}}">Trang chủ</a></li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Bảng chữ cái<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/hiragana_dn/{{Auth::user()->id}}">Hiragana</a></li>
                                    <li><a href="/katakana_dn/{{Auth::user()->id}}">Katakana</a></li>
                                    <li><a href="/hiraganaluyentap_dn/{{Auth::user()->id}}">Hiragana luyện tập</a></li>
                                    <li><a href="/katakanaluyentap_dn/{{Auth::user()->id}}">Katakana luyện tập</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Danh sách bài học<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                <?php
                                for ($i = 1; $i <= $last_bai; $i++) {?>
                                    <li><a href="bai/{{$i}}">Bài {{$i}}</a></li>
                                <?php 
                                }?>
                                </ul>
                            </li>
                            <li class=""><a href="/gioithieudn/{{Auth::user()->id}}">Giới thiệu</a></li>
                            <li class=""><a href="/diendan/{{Auth::user()->id}}">Diễn đàn</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{Auth::user()->name}}<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                <li><a href="#">Trang cá nhân</a></li>
                                <li><a href="#">Đổi mật khẩu</a></li>
                                <li><a href="#">Lịch học</a></li>
                                <li><a href="logout">Đăng xuất</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>    
        <div class="container content">
            <div class="dd"><h3><a href="">Trang chủ</a> >> <a href="">Danh sách bài học</a> >><a href=""> Bài {{$id}} </a>>>Kiểm tra</h3></div>
            <section>
                <div class="row">
                    <div class="col-md-8 col-8 ctbh">
                        <div class="ndchbdkt">
                            <form action="kiemtranp" method="POST" enctype="multipart/form-data">                        
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/> 
                                <?php
                                    date_default_timezone_set("Asia/Ho_Chi_Minh");
                                    $today = getdate();
                                    $h = $today['hours'];
                                    $m = $today['minutes'];
                                    $s = $today['seconds'];
                                    $total1=$h*3600+$m*60+$s; 
                                ?> 
                                <input type="hidden" name="hv" value="{{Auth::user()->id}}">
                                <input type="hidden" id="timenow" value="{{$total1}}"/>
                                <input type="hidden" name="bai" value="{{$id}}" id="bai">
                                <input type="hidden" name="idkq" value="{{$id_kq}}" id="idkq">
                                <input type="hidden" id='second_left'>
                                <input type="hidden" id='minute'>  
                                <input type="hidden" id='second'>
                                <?php $i=1;?>
                                <h2>Bài tập: Điền từ thích hợp vào chỗ trống</h2>
                                <div class="row">
                                    <div class="col-md-9 col-md-offset-1">
                                        <?php $i=1;?>
                                        @foreach ($ktra as $kt) 
                                        <div class="">
                                            <input type="hidden" name="id_ch[{{$i}}]" value="{{$kt->id}}">
                                            <p>Câu {{$i++}}: <?php echo $kt->noidung?></p>
                                            @if($kt->dapandung!=null)
                                            <input type="text" name="luachon[{{$i-1}}]"/>
                                            <div class="hienthidapan">
                                                <p class="btnhtda"><<Đáp án>></p>
                                                <div class="ndda">
                                                    <p>{{$kt->dapandung}}</p>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 col-md-offset-5 btn-hoanthanh" id="">
                                        <input type="submit" class="btn btn-add btn-primary" value="Nộp bài"/>
                                    </div>
                                </div>

                                <input type="hidden" id="timebegin" value="{{$gbd}}"/>
                                <input type="hidden" id="timeend" value="{{$gkt}}"/>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-4 dsbh_p2"> 
                    @if($last_bai>=1)   
                        <div class="hangbh">
                            <?php
                            for ($i = 1; $i <= $last_bai; $i++) {?>
                                <a href="baidn/{{$i}}/{{Auth::user()->id}}"><div class="baihoc">{{$i}}</div></a>
                            <?php 
                            }?>
                        </div>
                    @endif
                    @if($last_bai>6) 
                        <div class="hangbh">
                            <?php
                            for ($i = 6; $i <= 10; $i++) {?>
                                <a href="baidn/{{$i}}"><div class="baihoc">{{$i}}</div></a>
                            <?php 
                            }?>
                        </div>
                    @endif
                    @if($last_bai>11) 
                        <div class="hangbh">
                            <?php
                            for ($i = 11; $i <= 15; $i++) {?>
                                <a href="baidn/{{$i}}"><div class="baihoc">{{$i}}</div></a>
                            <?php 
                            }?>
                        </div>    
                    @endif
                    @if($last_bai>16) 
                        <div class="hangbh">
                            <?php
                            for ($i = 16; $i <= 20; $i++) {?>
                                <a href="baidn/{{$i}}"><div class="baihoc">{{$i}}</div></a>
                            <?php 
                            }?>
                        </div>    
                    @endif
                    @if($last_bai>21)                 
                        <div class="hangbh">
                            <?php
                            for ($i = 21; $i <= 25; $i++) {?>
                                <a href="baidn/{{$i}}"><div class="baihoc">{{$i}}</div></a>
                            <?php 
                            }?>
                        </div>  
                    @endif                
                </div>
            </section>
            </div>
            <div id="countdown">
            <div id='tiles1'>                
            </div>
            <div class="labels">
                <li>Mins</li>
                <li>Secs</li>
            </div>
        </div>   
            <footer class="page-footer">
            <div class="container">      
                <div class="row">       
                    <div class="col-md-6 mt-md-0 mt-3">        
                    <h5 class="text-uppercase">Nihongo</h5>
                    <p>Nơi sẻ chia và học tập.</p>
                    </div>       
                    <div class="col-md-3 mb-md-0 mb-3">
                    </div>
                    <div class="col-md-3 mb-md-0 mb-3">            
                    </div>       
                </div>
            </div>
            <div class="footer-copyright text-center py-3">© 2018 Copyright:
            <a href="/"> Nihongo.com</a>
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="client/assets/js/bootstrap.min.js"></script>        
        <script>
        function loadpage()
        { 
            var y = 5*60*1000;
            setTimeout(function() {
                alert('Hết giờ');
                $.ajax({
                type: "POST",
                url: "/kiemtranp",
                data: $('form').serialize(),
                success: function(msg) {
                }
                });
                idkq = document.getElementById('idkq').value;
                bai = document.getElementById('bai').value;
                window.open ("http://localhost:8000/kqktnp/"+ idkq + "/"+bai);
                clearInterval(timerId);
                $('#countdown').hide();
            }, y);  
            $('#tiles1').show();   
            var gbd = parseInt(document.getElementById("timebegin").value);   
            var ght = parseInt(document.getElementById("timenow").value); 
            var gcl= ght-gbd;      
            if(gcl * 1000 >y)
            {
                alert('Hết giờ');
                $.ajax({
                type: "POST",
                url: "/kiemtranp",
                data: $('form').serialize(),
                success: function(msg) {
                }
                });
                idkq = document.getElementById('idkq').value;
                bai = document.getElementById('bai').value;
                window.open ("http://localhost:8000/kqktnp/"+ idkq + "/"+bai);
            }  
            else
            {
                var target_date = new Date().getTime() +(y-(gcl*1000));
                var minutes, seconds; 
                var countdown1 = document.getElementById("tiles1");
                getCountdown();
                var timerId = setInterval(function () { getCountdown(); }, 1000);
                function getCountdown(){
                    var current_date = new Date().getTime();
                    var seconds_left = (target_date - current_date) / 1000;		  
                    minutes = pad( parseInt(seconds_left / 60) );
                    seconds = pad( parseInt( seconds_left % 60 ) );
                    second_left.value=seconds_left;
                    minute.value=minutes;
                    second.value=seconds;
                    countdown1.innerHTML =  "</span><span>" + minutes + "</span><span>" + seconds + "</span>"; 
                }
                function pad(n) {
                    return (n < 10 ? '0' : '') + n;
                }
            }
        }
        </script>
        </body>
    </html>
