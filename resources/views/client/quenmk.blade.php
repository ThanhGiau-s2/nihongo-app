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
    </head>
    <body>
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
                        <li class="active"><a href="/index_dangnhap/{{Auth::user()->id}}">Trang chủ</a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Bảng chữ cái<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/hiragana">Hiragana</a></li>
                                <li><a href="/katakana">Katakana</a></li>
                                <li><a href="/hiraganaluyentap">Hiragana luyện tập</a></li>
                                <li><a href="/katakanaluyentap">Katakana luyện tập</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Danh sách bài học<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                            <?php
                            for ($i = 1; $i <= 25; $i++) {?>
                                <li><a href="baidn/{{$i}}">Bài {{$i}}</a></li>
                            <?php 
                            }?>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    
                    </ul>
                </div>
            </div>
        </nav>    
        <div class="container content">
            <div class="dd">
                <h3><a href="index_dangnhap/{{Auth::user()->id}}">Trang chủ</a> >> Tạo mới mật khẩu</h3>
            </div>
            <section>
                <div class="row">
                    <div class="col-md-8 col-8 ctbh">
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form style="margin-top:40px;" action="taomoimk" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>        
                            <input type="hidden" name="email" value="{{$email}}"/>    
                            <div class="form-group row" >
                                <label for="" class="col-sm-2 col-form-label">Mật khẩu mới:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="new_pw" value="" placeholder="Mật khẩu mới"/>
                                </div>
                            </div>
                            <div class="form-group row" >
                                <label for="" class="col-sm-2 col-form-label">Nhập lại mật khẩu mới:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="new_pw_confirmation" placeholder="Nhập lại mật khẩu mới">
                                </div>
                            </div>                
                            <div class="form-group row">
                                <div class="col-sm-2">                 
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                                <div class="col-sm-2">               
                                    <a class="btn btn-success" href="/index_dangnhap/{{Auth::user()->id}}">Trở về</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 col-4  dsbh_p2">                    
                        <div class="hangbh">
                            <?php
                            for ($i = 1; $i <= 5; $i++) {?>
                                <a href="baidn/{{$i}}"><div class="baihoc">{{$i}}</div></a>
                            <?php 
                            }?>
                        </div>
                        <div class="hangbh">
                            <?php
                            for ($i = 6; $i <= 10; $i++) {?>
                                <a href="baidn/{{$i}}"><div class="baihoc">{{$i}}</div></a>
                            <?php 
                            }?>
                        </div>
                        <div class="hangbh">
                            <?php
                            for ($i = 11; $i <= 15; $i++) {?>
                                <a href="baidn/{{$i}}"><div class="baihoc">{{$i}}</div></a>
                            <?php 
                            }?>
                        </div>    
                        <div class="hangbh">
                            <?php
                            for ($i = 16; $i <= 20; $i++) {?>
                                <a href="baidn/{{$i}}"><div class="baihoc">{{$i}}</div></a>
                            <?php 
                            }?>
                        </div>                    
                        <div class="hangbh">
                            <?php
                            for ($i = 21; $i <= 25; $i++) {?>
                                <a href="baidn/{{$i}}"><div class="baihoc">{{$i}}</div></a>
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
            <a href="https://mdbootstrap.com/bootstrap-tutorial/"> Nihongo.com</a>
            </div>
        </footer>
        <script src="client/assets/js/jquery-2.1.1.min.js"></script>
        <script src="client/assets/js/bootstrap.min.js"></script>
        <script src="client/assets/js/main.js"></script>
        </body>
    </html>
