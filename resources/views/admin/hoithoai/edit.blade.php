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
                <form action="admin/hoithoai/edit/{{$hoithoais->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Sửa hội thoại</h5>                                
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
                                <option value="{{$hoithoais->id_bai}}">{{$hoithoais->id_bai}}</option>                                            
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
                            <label class="col-sm-3 col-form-label">Tiêu đề:<span id="required">*</span></label>
                            <div class="col-sm-9">
                                <input name="tieude" class="form-control" placeholder="Tiêu đề" value="{{$hoithoais->tieude}}">                                            
                                @if ($errors->has('tieude'))
                                    <span class="error">{{$errors->first('tieude')}}</span>
                                @endif
                            </div>
                        </div>     
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Hình đại diện:<span id="required">*</span></label>
                            <div class="col-sm-9">
                                <input name="hinhdaidien" class="form-control" type="file">                                            
                                @if ($errors->has('hinhdaidien'))
                                    <span class="error">{{$errors->first('hinhdaidien')}}</span>
                                @endif
                            </div>
                        </div>     
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nội dung:<span id="required">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="noidung" class="form-control" placeholder="Nội dung"><?php echo $hoithoais->noidung;?></textarea>                                            
                                @if ($errors->has('noidung'))
                                    <span class="error">{{$errors->first('noidung')}}</span>
                                @endif
                            </div>
                        </div>     
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mp3:<span id="required">*</span></label>
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
                        <a type="" href="admin/hoithoai/list" class="btn btn-secondary">Trở về</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection