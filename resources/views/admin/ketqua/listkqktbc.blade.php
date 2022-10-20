@extends('admin.layout.master')
@section('content')
<div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                   
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        
                    </ol>                    
                </div>            
            </div>
        </div>
        <div class="container">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col mr-auto">
                                <h2 class="header-text">Danh sách kết quả kiểm tra bài cũ</h2>
                            </div>
                        </div>
                        <div class="card-body">                        
                            <div class="row">
                                <div class="col-sm-12">
                                @if(session('thongbao'))
                                    <div class="alert alert-success">
                                        {{session('thongbao')}}
                                    </div>
                                @endif
                                    <table class="table table-striped table-bordered table-hover" id="database">
                                        <thead>                                               
                                            <tr>
                                                <th>#</th>                                                                                    
                                                <th>Id học viên</th>
                                                <th>Tên học viên</th>
                                                <th>Bài</th>   
                                                <th>Kết quả</th>   
                                                <th>Giờ bắt đầu</th> 
                                                <th>Giờ hoàn thành</th>      
                                                <th>Thời gian hoàn thành</th>                                                
                                                <th>Ngày</th>
                                                <th></th>
                                            </tr>                                              
                                        </thead>
                                        <tbody>  
                                        <?php $i =1;?> 
                                        @foreach ($kqktbc as $b)                                     
                                            <tr class="odd gradeX">
                                            <?php 
                                            $h= $b->giobatdau/3600;
                                            $hs=(int)$h;
                                            $p= (($b->giobatdau)-($hs*3600))/60;
                                            $ps=(int)$p;
                                            $m= ($b->giobatdau)-($hs*3600)-($ps*60);
                                            ?>
                                            <?php 
                                            $hkt= ($b->giohoanthanh)/3600;
                                            $hskt=(int)$hkt;
                                            $pkt= (($b->giohoanthanh)-($hskt*3600))/60;
                                            $pskt=(int)$pkt;
                                            $mkt= ($b->giohoanthanh)-($hskt*3600)-($pskt*60);
                                            ?>
                                            <?php
                                            $tglb = ($b->giohoanthanh)-($b->giobatdau);
                                            $plb= ($tglb/60);
                                            $pslb=(int)$plb;
                                            $mlb= $tglb-($pslb*60);
                                            ?>
                                                <td class="center">{{$i++}}</td>
                                                <td class="center">{{$b->id_hv}}</td>                                                    
                                                <td class="center">{{$b->name}}</td> 
                                                <td class="center">{{$b->id_bai}}</td>    
                                                <td class="center">{{$b->ketqua}}</td>  
                                                <td class="center">{{$hs.':'.$ps.':'.$m}}</td>  
                                                <td class="center">{{$hskt.':'.$pskt.':'.$mkt}}</td>   
                                                <td class="center">{{$pslb.':'.$mlb}}</td>    
                                                <td class="center">{{$b->ngay}}</td>                                                                                            
                                                <td>
                                                    <!-- <form method="get" action="admin/ketqua/deletekqktbc/{{$b->id_kqktbc}}" accept-charset="UTF-8" style="display:inline">
                                                        <a data-toggle="modal" data-target="#confirmDelete" data-title="Confirm delete" data-message="Bạn có muốn xóa không?">
                                                            <i class="fa fa-remove text-danger"></i>
                                                        </a>
                                                    </form>      -->
                                                </td>
                                            </tr>   
                                        @endforeach                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </div><!-- /#right-panel -->
    @include('admin.delete_confirm')
@endsection