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
                <form action="admin/giaithichnguphap/edit/{{$noidung_nps->id}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Sửa ngữ pháp</h5>                                
                    </div>
                    <div class="modal-body">                            
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Ngữ pháp:</label>
                            <div class="col-sm-9">
                                <select name="id_np" class="form-control select-option" id="">
                                <option value="{{$noidung_nps->id_np}}">{{$noidung_nps->id_np}}</option>                                            
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
                            <label class="col-sm-3 col-form-label">Nội dung:<span id="required">*</span></label>
                            <div class="col-sm-9">
                                <input name="noidung" class="form-control" value="{{$noidung_nps->noidung}}">                                            
                                @if ($errors->has('noidung'))
                                    <span class="error">{{$errors->first('noidung')}}</span>
                                @endif
                            </div>
                        </div>                            
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a type="" href="admin/giaithichnguphap/list" class="btn btn-secondary">Trở về</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection