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
                <a class="navbar-brand" href="/">Nihongo</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>              
            <div class="collapse navbar-collapse" id="collapse"> 
                <ul class="nav navbar-nav">
                    <li class=""><a href="/">Trang chủ</a></li>
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
                            <li><a href="bai/{{$i}}">Bài {{$i}}</a></li>
                        <?php 
                        }?>
                        </ul>
                    </li>
                    <li class=""><a href="/gioithieu">Giới thiệu</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/guimaxacnhan"><i class="fa fa-user-plus" aria-hidden="true"></i> Đăng kí</a></li>
                    <li>
                        <a href="/login"><i class="fa fa-sign-in" aria-hidden="true"></i> 
                        Đăng nhập
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    
    </nav>  
</div>
