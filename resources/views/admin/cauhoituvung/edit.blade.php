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
    </div>
    <div class="container-fluid">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admin/cauhoituvung/edit/{{$cauhoituvungs->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Sửa câu hỏi từ vựng</h5>                                
                    </div>
                    @if(session('thongbao'))
                        <div class="alert alert-danger">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <div class="modal-body">    
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Bài:</label>
                            <div class="col-sm-9">
                                <select name="id_bai" class="form-control select-option" id="">
                                <option value="{{$cauhoituvungs->id_bai}}">{{$cauhoituvungs->id_bai}}</option>                                            
                                    @foreach($baisa as $b)
                                        <option value="{{$b->id}}"/>{{$b->ten}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('id_bai'))
                                    <span class="error">{{$errors->first('id_bai')}}</span>
                                @endif
                            </div>
                        </div>                           
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nội dung:<span id="required">*</span></label>
                            <div class="col-sm-9">
                                <input name="noidung" class="form-control" value="{{$cauhoituvungs->noidung}}" type="file">                                            
                                @if ($errors->has('noidung'))
                                    <span class="error">{{$errors->first('noidung')}}</span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group row">            
                            <div class="col-sm-3">Đáp án:</div>                       
                        </div>        
                        <div class="all_ans">                        
                            <div id="options">
                                <div class="form-group row">        
                                    <div class="col-sm-1 offset-sm-2">
                                        <p class="form-control-plaintext">A. <input type="radio" name="opt_iscorrect" class="" value="1"
                                        @if ($cauhoituvungs->dapandung==1)
                                        checked="true"
                                        @endif></p>            
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control sem-semester" placeholder="Đáp án" name="dapan1" value="{{$cauhoituvungs->dapan1}}">
                                    </div>            
                                </div>
                                <div class="form-group row">        
                                    <div class="col-sm-1 offset-sm-2">
                                        <p class="form-control-plaintext">B. <input type="radio" name="opt_iscorrect" class="" value="2"
                                        @if ($cauhoituvungs->dapandung==2)
                                        checked="true"
                                        @endif></p>            
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control sem-semester" placeholder="Đáp án" name="dapan2" value="{{$cauhoituvungs->dapan2}}"/>
                                    </div>            
                                </div>
                                <div class="form-group row">        
                                    <div class="col-sm-1 offset-sm-2">
                                        <p class="form-control-plaintext">C. <input type="radio" name="opt_iscorrect" class="" value="3"
                                        @if ($cauhoituvungs->dapandung==3)
                                        checked="true"
                                        @endif></p>            
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control sem-semester" placeholder="Đáp án" name="dapan3" value="{{$cauhoituvungs->dapan3}}">
                                    </div>            
                                </div>                            
                                <div class="form-group row">        
                                    <div class="col-sm-1 offset-sm-2">
                                        <p class="form-control-plaintext">D. <input type="radio" name="opt_iscorrect" class="" value="4"
                                        @if ($cauhoituvungs->dapandung==4)
                                        checked="true"
                                        @endif></p>            
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control sem-semester" placeholder="Đáp án" name="dapan4" value="{{$cauhoituvungs->dapan4}}">
                                    </div>            
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a type="" href="admin/cauhoituvung/list" class="btn btn-secondary">Trở về</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection