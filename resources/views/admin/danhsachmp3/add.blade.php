@extends('admin.layout.master')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Trang chủ</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Trang chủ</li>
                    </ol>                    
                </div>            
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admin/danhsachmp3/add" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm danh sách mp3</h5>                                
                    </div>
                    <div class="modal-body"> 
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Bài:</label>
                            <div class="col-sm-8">
                                <select name="id_bai" class="form-control select-option" id="">
                                <option value="0">Vui lòng chọn bài</option>                                            
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
                            <label class="col-sm-4 col-form-label">Từ vựng:<span id="required">*</span></label>
                            <div class="col-sm-8">
                                <input name="mp3tuvung" class="form-control" type="file">                                            
                                @if ($errors->has('mp3tuvung'))
                                    <span class="error">{{$errors->first('mp3tuvung')}}</span>
                                @endif
                            </div>
                        </div>                             
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Đọc văn mẫu:<span id="required">*</span></label>
                            <div class="col-sm-8">
                                <input name="mp3docvanmau" class="form-control" type="file">                                            
                                @if ($errors->has('mp3docvanmau'))
                                    <span class="error">{{$errors->first('mp3docvanmau')}}</span>
                                @endif
                            </div>
                        </div>    
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Bài tập nghe 1:<span id="required">*</span></label>
                            <div class="col-sm-8">
                                <input name="mp3btn1" class="form-control" type="file">                                            
                                @if ($errors->has('mp3btn1'))
                                    <span class="error">{{$errors->first('mp3btn1')}}</span>
                                @endif
                            </div>
                        </div>    
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Bài tập nghe 2:<span id="required">*</span></label>
                            <div class="col-sm-8">
                                <input name="mp3btn2" class="form-control" type="file">                                            
                                @if ($errors->has('mp3btn2'))
                                    <span class="error">{{$errors->first('mp3btn2')}}</span>
                                @endif
                            </div>
                        </div>                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a type="" href="admin/danhsachmp3/list" class="btn btn-secondary">Trở về</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection