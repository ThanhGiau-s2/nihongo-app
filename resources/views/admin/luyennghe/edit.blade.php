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
                <form action="admin/luyennghe/edit/{{$luyennghes->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Sửa bài nghe</h5>                                
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
                                <input name="id_bai" class="form-control" readonly type="text" value="{{$luyennghes->id_bai}}">    
                                @if ($errors->has('id_bai'))
                                    <span class="error">{{$errors->first('id_bai')}}</span>
                                @endif
                            </div>
                        </div>   
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Câu:</label>
                            <div class="col-sm-9">
                            <input name="cau" class="form-control" type="number" value="{{$luyennghes->cau}}"> 
                                @if ($errors->has('cau'))
                                    <span class="error">{{$errors->first('cau')}}</span>
                                @endif
                            </div>
                        </div>                           
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Hình:<span id="required">*</span></label>
                            <div class="col-sm-9">
                                <input name="hinh" class="form-control" type="file">                                            
                                @if ($errors->has('hinh'))
                                    <span class="error">{{$errors->first('hinh')}}</span>
                                @endif
                            </div>
                        </div>   
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">MP3:<span id="required">*</span></label>
                            <div class="col-sm-9">
                                <input name="mp3" class="form-control" type="file">                                            
                                @if ($errors->has('mp3'))
                                    <span class="error">{{$errors->first('mp3')}}</span>
                                @endif
                            </div>
                        </div>                             
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a type="" href="admin/luyennghe/list" class="btn btn-secondary">Trở về</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection