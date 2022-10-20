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
                <form action="admin/bangchucai/add" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm bảng chữ cái</h5>                                
                    </div>
                    <div class="modal-body">     
                                             
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tên:<span id="required">*</span></label>
                            <div class="col-sm-9">
                                <input name="ten" class="form-control" placeholder="Tên">                                            
                                @if ($errors->has('ten'))
                                    <span class="error">{{$errors->first('ten')}}</span>
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
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a type="" href="admin/bangchucai/list" class="btn btn-secondary">Trở về</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection