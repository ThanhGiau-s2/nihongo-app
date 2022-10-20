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
                <form action="admin/bangchucaichitiet/edit/{{$bccs->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Sửa chữ cái</h5>                                
                    </div>
                    <div class="modal-body">    
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Hiragana:<span id="required">*</span></label>
                            <div class="col-sm-9">
                                <input name="hira" class="form-control" type="text" value="{{$bccs->hira}}">                                            
                                @if ($errors->has('hira'))
                                    <span class="error">{{$errors->first('hira')}}</span>
                                @endif
                            </div>
                        </div>                      
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Katakana:<span id="required">*</span></label>
                            <div class="col-sm-9">
                                <input name="kata" class="form-control" type="text" value="{{$bccs->kata}}">                                            
                                @if ($errors->has('kata'))
                                    <span class="error">{{$errors->first('kata')}}</span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Romaji:<span id="required">*</span></label>
                            <div class="col-sm-9">
                                <input name="romaji" class="form-control" type="text" value="{{$bccs->romaji}}">                                            
                                @if ($errors->has('romaji'))
                                    <span class="error">{{$errors->first('romaji')}}</span>
                                @endif
                            </div>
                        </div>       
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Âm thanh:<span id="required">*</span></label>
                            <div class="col-sm-9">
                                <input name="amthanh" class="form-control" type="file">                                            
                                @if ($errors->has('amthanh'))
                                    <span class="error">{{$errors->first('amthanh')}}</span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Loại:</label>
                            <div class="col-sm-9">
                                <select name="loai" class="form-control select-option" id="">
                                <option value="{{$bccs->loai}}">{{$bccs->loai}}</option>                                             
                                    @for($i=1;$i<3;$i++ )
                                        <option value="{{$i}}"/>{{$i}}</option>
                                    @endfor
                                </select>
                                @if ($errors->has('loai'))
                                    <span class="error">{{$errors->first('loai')}}</span>
                                @endif
                            </div>
                        </div>        
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a type="" href="admin/bangchucaichitiet/list" class="btn btn-secondary">Trở về</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection