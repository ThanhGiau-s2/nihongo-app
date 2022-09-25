<div class="container canchinh gioithieu">
    <div class="row">
            <div class="col-md-2 logo"><a href="/index_dangnhap/{{Auth::user()->id}}"><img src="client/assets/images/nihongo.jpg"/></a></div>
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
                <li class="active"><a href="/index_dangnhap/{{Auth::user()->id}}">Trang chủ</a></li>
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
                        <li><a href="baidn/{{$i}}/{{Auth::user()->id}}">Bài {{$i}}</a></li>
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
                    <li><a href="trangcanhan/{{Auth::user()->id}}">Trang cá nhân</a></li>
                    <li><a href="doimk/{{Auth::user()->id}}">Đổi mật khẩu</a></li>
                    <li><a href="lichhoc/{{Auth::user()->id}}">Lịch học</a></li>
                    <li><a href="kqkt/{{Auth::user()->id}}">Kết quả kiểm tra</a></li>
                    <li><a href="logout">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>    
</div>