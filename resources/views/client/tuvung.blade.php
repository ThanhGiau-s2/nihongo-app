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
        <link href="admin/assets/plugins/datatables/datatables.min.css" rel="stylesheet" />
        <link href="admin/assets/plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
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
                        <li class="active"><a href="#">Trang chủ</a></li>
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
                        <li><a href="/login"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a></li>
                    </ul>
                </div>
            </div>
        </nav> 
    </div>   
        <div class="container content">
            <div class="dd"><h3><a href="">Trang chủ</a> >> <a href="dsbh">Danh sách bài học</a> >><a href="bai/{{$id}}"> Bài {{$id}} </a>>>Từ vựng</h3></div>
            <section>
                <div class="row">
                    <div class="col-md-8 col-xs-12 ctbh">
                        @foreach ($dsmp3s as $mp3)  
                        <div class="mp3tuvung">
                            <audio controls style="width: 100%;">
                                <source src="upload/tuvung/{{$mp3->mp3tuvung}}" type="audio/mpeg">
                            </audio>
                        </div>
                        @endforeach    
                        <div class="tuvung_pc">  
                            <table class="table table-striped table-bordered table-hover data-table" id="database">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Hiragana</th>
                                        <th>Âm thanh</th>
                                        <th>Hán tự</th>
                                        <th>Nghĩa</th>
                                    </tr>
                                </thead>
                                <tbody>    
                                <?php $i=1;?>
                                    @foreach ($tv as $t)                          
                                        <tr class="odd gradeX">
                                            <td class="center">{{$i++}}</td>
                                            <td class="center">{{$t->hiragana}}</td>  
                                            <td class="center">
                                                <audio id="linkAudio" controls style="width: 200px;">
                                                    <source src="upload/tuvungtheobai/{{$t->amthanh}}" type="audio/mpeg">
                                                </audio>
                                            </td>     
                                            <td class="center">{{$t->hantu}}</td>  
                                            <td class="center">{{$t->nghia}}</td>  
                                        </tr>  
                                    @endforeach                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="tuvung_sp">
                            <table id="database_sp">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Hiragana</th>
                                        <th>Âm thanh</th>
                                        <th>Hán tự</th>
                                        <th>Nghĩa</th>
                                    </tr>
                                </thead>
                                <tbody>    
                                    @foreach ($tv as $t)                          
                                        <tr class="odd gradeX">
                                            <td class="center">{{$t->id}}</td>
                                            <td class="center">{{$t->hiragana}}</td>  
                                            <td class="center">
                                                <audio id="linkAudio" controls style="width: 55px;">
                                                    <source src="upload/tuvungtheobai/{{$t->amthanh}}" type="audio/mpeg">
                                                </audio>
                                            </td>     
                                            <td class="center">{{$t->hantu}}</td>  
                                            <td class="center">{{$t->nghia}}</td>  
                                        </tr>  
                                    @endforeach                                    
                                </tbody>
                            </table>
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
            <a href="https://mdbootstrap.com/bootstrap-tutorial/"> Nihongo.com</a>
            </div>
        </footer>
        <script src="admin/assets/plugins/datatables/datatables.min.js" ></script>
        <script src="admin/assets/plugins/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <script src="admin/assets/plugins/datatables/Buttons-1.5.1/js/dataTables.buttons.min.js"></script>
        <script src="admin/assets/plugins/datatables/pdfmake-0.1.32/pdfmake.min.js"></script>
        <script src="admin/assets/plugins/datatables/JSZip-2.5.0/jszip.min.js"></script>
        <script src="admin/assets/plugins/datatables/Buttons-1.5.1/js/buttons.bootstrap4.min.js"></script>
        <script src="admin/assets/plugins/datatables/Buttons-1.5.1/js/buttons.colVis.min.js"></script>
        <script src="admin/assets/plugins/datatables/Buttons-1.5.1/js/buttons.html5.min.js"></script>
        <script src="admin/assets/plugins/datatables/Buttons-1.5.1/js/buttons.print.min.js"></script>
        <script>
        $('#database').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'print'
		]
	} );
        </script>
        </body>
    </html>
