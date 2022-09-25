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
        <div class="container content">
            <div class="dd">
                <h3><a href="index_dangnhap/{{Auth::user()->id}}">Trang chủ</a> >> Kết quả kiểm tra</h3>
            </div>
            <section>  
                <div class="row">   
                    <div class="col-md-10 col-md-offset-1 col-xs-12">                
                        <h3 class="tieudeketqua">Kết quả kiểm tra bài cũ</h3>             
                        <table class="table table-striped table-bordered table-hover data-table" id="database">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Bài học</th> 
                                    <th>Kết quả</th>                                  
                                    <th>Ngày kiểm tra</th>
                                    <th>Giờ bắt đầu</th>
                                    <th>Giờ hoàn thành</th>
                                    <th>Thời gian hoàn thành</th>
                                </tr>
                            </thead>
                            <tbody>    
                            <?php $i =1;?>
                                @foreach ($lh as $l)                          
                                    <tr class="odd gradeX">
                                    <?php 
                                    $h= ($l->giobatdau)/3600;
                                    $hs=(int)$h;
                                    $p= (($l->giobatdau)-($hs*3600))/60;
                                    $ps=(int)$p;
                                    $m= ($l->giobatdau)-($hs*3600)-($ps*60);
                                    ?>
                                    <?php 
                                    $hkt= ($l->giohoanthanh)/3600;
                                    $hskt=(int)$hkt;
                                    $pkt= (($l->giohoanthanh)-($hskt*3600))/60;
                                    $pskt=(int)$pkt;
                                    $mkt= ($l->giohoanthanh)-($hskt*3600)-($pskt*60);
                                    ?>
                                    <?php
                                    $tglb = ($l->giohoanthanh)-($l->giobatdau);
                                    $plb= ($tglb/60);
                                    $pslb=(int)$plb;
                                    $mlb= $tglb-($pslb*60);
                                    ?>
                                        <td class="center">{{$i++}}</td>
                                        <td class="center">{{$l->id_bai}}</td>                                       
                                        <td class="center">{{$l->ketqua}}/10</td>
                                        <td class="center">{{$l->ngay}}</td>   
                                        <td class="center">{{$hs.':'.$ps.':'.$m}}</td>   
                                        <td class="center">{{$hskt.':'.$pskt.':'.$mkt}}</td>   
                                        <td class="center">{{$pslb.':'.$mlb}}</td>   
                                    </tr>  
                                @endforeach                                    
                            </tbody>
                        </table>
                    </div>
                </div>                
                <div class="row">      
                    <div class="col-md-10 col-md-offset-1 col-xs-12">                    
                        <h3 class="tieudeketqua">Kết quả kiểm tra từ vựng </h3>             
                        <table class="table table-striped table-bordered table-hover data-table" id="database">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Bài học</th> 
                                    <th>Kết quả</th>
                                    <th>Ngày làm bài</th>                               
                                    <th>Giờ bắt đầu</th>
                                    <th>Giờ hoàn thành</th>  
                                    <th>Thời gian hoàn thành</th>
                                </tr>
                            </thead>
                            <tbody>    
                            <?php $i =1;?>
                                @foreach ($kqtv as $kq)                          
                                    <tr class="odd gradeX">
                                    <?php 
                                    $h= ($kq->giobatdau)/3600;
                                    $hs=(int)$h;
                                    $p= (($kq->giobatdau)-($hs*3600))/60;
                                    $ps=(int)$p;
                                    $m= ($kq->giobatdau)-($hs*3600)-($ps*60);
                                    ?>
                                    <?php 
                                    $hkt= ($kq->giohoanthanh)/3600;
                                    $hskt=(int)$hkt;
                                    $pkt= round((($kq->giohoanthanh)-($hskt*3600))/60,1);
                                    $pskt=(int)$pkt;
                                    $mkt= ($kq->giohoanthanh)-($hskt*3600)-($pskt*60);
                                    ?>
                                    <?php
                                    $tglb = ($kq->giohoanthanh)-($kq->giobatdau);
                                    $plb= ($tglb/60);
                                    $pslb=(int)$plb;
                                    $mlb= $tglb-($pslb*60);
                                    ?>
                                        <td class="center">{{$i++}}</td>
                                        <td class="center">{{$kq->id_bai}}</td>                                          
                                        <td class="center">{{$kq->ketqua}}/6</td> 
                                        <td class="center">{{$kq->ngay}}</td>     
                                        <td class="center">{{$hs.':'.$ps.':'.$m}}</td>  
                                        <td class="center">{{$hskt.':'.$pskt.':'.$mkt}}</td>   
                                        <td class="center">{{$pslb.':'.$mlb}}</td>   
                                    </tr>  
                                @endforeach                                    
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row pb400">
                    <div class="col-md-10 col-md-offset-1 col-xs-12">   
                        <h3 class="tieudeketqua">Kết quả kiểm tra ngữ pháp </h3>             
                        <table class="table table-striped table-bordered table-hover data-table" id="database">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Bài học</th>   
                                    <th>Kết quả</th>   
                                    <th>Ngày làm bài</th>               
                                    <th>Giờ bắt đầu</th>
                                    <th>Giờ hoàn thành</th>  
                                    <th>Thời gian hoàn thành</th>
                                </tr>
                            </thead>
                            <tbody>    
                            <?php $i =1;?>
                                @foreach ($kqnp as $kq)                          
                                    <tr class="odd gradeX">
                                    <?php 
                                    $h= $kq->giobatdau/3600;
                                    $hs=(int)$h;
                                    $p= (($kq->giobatdau)-($hs*3600))/60;
                                    $ps=(int)$p;
                                    $m= ($kq->giobatdau)-($hs*3600)-($ps*60);
                                    ?>
                                    <?php 
                                    $hkt= ($kq->giohoanthanh)/3600;
                                    $hskt=(int)$hkt;
                                    $pkt= (($kq->giohoanthanh)-($hskt*3600))/60;
                                    $pskt=(int)$pkt;
                                    $mkt= ($kq->giohoanthanh)-($hskt*3600)-($pskt*60);
                                    ?>
                                    <?php
                                    $tglb = ($kq->giohoanthanh)-($kq->giobatdau);
                                    $plb= ($tglb/60);
                                    $pslb=(int)$plb;
                                    $mlb= $tglb-($pslb*60);
                                    ?>
                                        <td class="center">{{$i++}}</td>
                                        <td class="center">{{$kq->id_bai}}</td> 
                                        <td class="center">{{$kq->ketqua}}/3</td>                                          
                                        <td class="center">{{$kq->ngay}}</td>      
                                        <td class="center">{{$hs.':'.$ps.':'.$m}}</td>  
                                        <td class="center">{{$hskt.':'.$pskt.':'.$mkt}}</td>   
                                        <td class="center">{{$pslb.':'.$mlb}}</td>   
                                    </tr>  
                                @endforeach                                    
                            </tbody>
                        </table>                        
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
