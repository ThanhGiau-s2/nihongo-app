@extends('client.layout_dn.master')
@section('content')    
        <div class="container content">
            <div class="dd"><h3><a href="/index_dangnhap/{{Auth::user()->id}}">Trang chủ</a> >> <a href="/dsbhdn/{{Auth::user()->id}}">Danh sách bài học</a> >><a href="baidn/{{$id}}/{{Auth::user()->id}}"> Bài {{$id}} </a>>>Từ vựng</h3></div>
            <section>
                <div class="row">
                    <div class="col-md-8 col-8 ctbh">
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
                                    @foreach ($tv as $t)                          
                                        <tr class="odd gradeX">
                                            <td class="center">{{$t->id}}</td>
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
                        <div class="row">
                            <div class="col-md-1 col-md-offset-5 btn-hoanthanh" id="">
                                <a href="kiemtratv/{{$id}}" class="btn btn-add btn-primary">Làm bài tập</a>
                            </div>
                        </div>                       
                    </div>
@endsection              
            
