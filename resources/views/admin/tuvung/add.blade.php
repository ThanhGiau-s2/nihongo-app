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
                <form action="admin/tuvung/add" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm từ vựng</h5>                                
                    </div>
                    <div class="modal-body">       
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Bài:</label>
                            <div class="col-sm-9">
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
                            <label class="col-sm-3 col-form-label">Hiragana:<span id="required">*</span></label>
                            <div class="col-sm-9">
                                <input name="hiragana" class="form-control" placeholder="Hiragana">                                            
                                @if ($errors->has('hiragana'))
                                    <span class="error">{{$errors->first('hiragana')}}</span>
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
                            <label class="col-sm-3 col-form-label">Hán tự:<span id="required">*</span></label>
                            <div class="col-sm-9">
                                <input name="hantu" class="form-control" placeholder="Hán tự">                                            
                                @if ($errors->has('hantu'))
                                    <span class="error">{{$errors->first('hantu')}}</span>
                                @endif
                            </div>
                        </div>     
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nghĩa:<span id="required">*</span></label>
                            <div class="col-sm-9">
                                <input name="nghia" class="form-control" placeholder="Nghĩa">                                            
                                @if ($errors->has('nghia'))
                                    <span class="error">{{$errors->first('nghia')}}</span>
                                @endif
                            </div>
                        </div>                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a type="" href="admin/tuvung/list" class="btn btn-secondary">Trở về</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection