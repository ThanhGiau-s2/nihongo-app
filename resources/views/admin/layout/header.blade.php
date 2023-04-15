<!-- Header-->
<header id="header" class="header">
    <div class="header-menu">
        <div class="col-sm-7">
        </div>
        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Auth::guard('nhanvien')->user()->ten}}
                <span class="caret"></span>
                </a>
                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="ad/trangcanhan"><i class="fa fa- user"></i>Trang cá nhân</a>
                    <a class="nav-link" href="ad/doimk/{{Auth::guard('nhanvien')->user()->id}}"><i class="fa fa- user"></i>Đổi mật khẩu</a>
                    <a class="nav-link" href="ad/logout"><i class="fa fa-power -off"></i>Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>
</header><!-- /header -->
<!-- Header-->