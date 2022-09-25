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
    </head>
    <body>
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
                    <a class="navbar-brand" href="#">Nihongo</a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>              
                <div class="collapse navbar-collapse" id="collapse"> 
                    <ul class="nav navbar-nav">
                        <li class=""><a href="#">Trang chủ</a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Bảng chữ cái<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                            <li><a href="#">Hiragana</a></li>
                            <li><a href="#">Katakana</a></li>
                            <li><a href="#">Hiragana luyện tập</a></li>
                            <li><a href="#">Katakana luyện tập</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Danh sách bài học<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                            <?php
                            for ($i = 1; $i <= 25; $i++) {?>
                                <li><a href="bai/{{$i}}">Bài {{$i}}</a></li>
                            <?php 
                            }?>
                            </ul>
                        </li>
                        <li class=""><a href="/gioithieu">Giới thiệu</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/guimaxacnhan"><i class="fa fa-user-plus" aria-hidden="true"></i> Đăng kí</a></li>
                        <li><a href="/login"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a></li>
                    </ul>
                </div>
            </div>
        </nav> 
    </div>   
        <div class="container content">
            <div class="dd"><h3><a href="">Trang chủ</a> >> <a href="dsbh">Danh sách bài học</a> >><a href="bai/{{$id}}"> Bài {{$id}} </a> >>Đọc văn mẫu</h3></div>
            <section>
                <div class="row">
                    <div class="col-md-8 col-xs-12 ctbh dvm">
                        @foreach ($dvm as $d)  
                            <div class="">
                                <audio controls style="width: 300px;">
                                    <source src="upload/docvanmau/{{$d->mp3docvanmau}}" type="audio/mpeg">
                                </audio>    
                            </div>  
                        @endforeach
                        <?php $i=1;?>
                        <div class="docvanmau">
                            @foreach($dvmha as $dvm)
                                <p><b>Câu {{$i++}}:</b> {{$dvm->noidung}}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4 dsbh_p2">     
                    <h3 style="text-align:center">Danh sách bài học</h3>                 
                        <div class="hangbh">
                            <?php
                            for ($i = 1; $i <= 5; $i++) {?>
                                @if(isset($id)&& $i==$id)
                                    <a href="bai/{{$i}}"><div class="baihocactive">{{$i}}</div></a>
                                @else
                                    <a href="bai/{{$i}}"><div class="baihoc">{{$i}}</div></a>
                                @endif  
                            <?php 
                            }?>
                        </div>
                        <div class="hangbh">
                            <?php
                            for ($i = 6; $i <= 10; $i++) {?>
                                @if(isset($id)&& $i==$id)
                                    <a href="bai/{{$i}}"><div class="baihocactive">{{$i}}</div></a>
                                @else
                                    <a href="bai/{{$i}}"><div class="baihoc">{{$i}}</div></a>
                                @endif  
                            <?php 
                            }?>
                        </div>
                        <div class="hangbh">
                            <?php
                            for ($i = 11; $i <= 15; $i++) {?>
                                @if(isset($id)&& $i==$id)
                                    <a href="bai/{{$i}}"><div class="baihocactive">{{$i}}</div></a>
                                @else
                                    <a href="bai/{{$i}}"><div class="baihoc">{{$i}}</div></a>
                                @endif  
                            <?php 
                            }?>
                        </div>    
                        <div class="hangbh">
                            <?php
                            for ($i = 16; $i <= 20; $i++) {?>
                                @if(isset($id)&& $i==$id)
                                    <a href="bai/{{$i}}"><div class="baihocactive">{{$i}}</div></a>
                                @else
                                    <a href="bai/{{$i}}"><div class="baihoc">{{$i}}</div></a>
                                @endif  
                            <?php 
                            }?>
                        </div>                    
                        <div class="hangbh">
                            <?php
                            for ($i = 21; $i <= 25; $i++) {?>
                                @if(isset($id)&& $i==$id)
                                    <a href="bai/{{$i}}"><div class="baihocactive">{{$i}}</div></a>
                                @else
                                    <a href="bai/{{$i}}"><div class="baihoc">{{$i}}</div></a>
                                @endif  
                            <?php 
                            }?>
                        </div>                        
                    </div>
                </div>
            </section>
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
        </body>
    </html>
