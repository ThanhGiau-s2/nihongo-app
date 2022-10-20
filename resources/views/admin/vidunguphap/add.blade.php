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
                <form action="admin/vidunguphap/add" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm ví dụ</h5>                                
                    </div>
                    <div class="modal-body">    
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Ngữ pháp:</label>
                            <div class="col-sm-9">
                                <select name="id_np" class="form-control select-option" id="">
                                <option value="0">Vui lòng chọn ngữ pháp</option>                                            
                                    @foreach($npsa as $np)
                                        <option value="{{$np->id}}"/>{{$np->ten}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('id_np'))
                                    <span class="error">{{$errors->first('id_np')}}</span>
                                @endif
                            </div>
                        </div>                           
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tiếng Nhật:<span id="required">*</span></label>
                            <div class="col-sm-9">
                                <input name="tiengnhat" class="form-control" placeholder="Tiếng Nhật">                                            
                                @if ($errors->has('tiengnhat'))
                                    <span class="error">{{$errors->first('tiengnhat')}}</span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tiếng Việt:<span id="required">*</span></label>
                            <div class="col-sm-9">
                                <input name="tiengviet" class="form-control" placeholder="Tiếng Việt">                                            
                                @if ($errors->has('tiengviet'))
                                    <span class="error">{{$errors->first('tiengviet')}}</span>
                                @endif
                            </div>
                        </div>                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a type="" href="admin/vidunguphap/list" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection