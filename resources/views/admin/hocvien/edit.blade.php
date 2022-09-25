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
                <form action="admin/hocvien/edit/{{$hocviens->id}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Sửa học viên</h5>                                
                    </div>
                    <div class="modal-body">                            
                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tên') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="ten" value="{{$hocviens->name}}" required autofocus>

                                @if ($errors->has('ten'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ten') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$hocviens->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        
                        
                        <div class="form-group row">
                            <label for="active" class="col-md-4 col-form-label text-md-right">{{ __('Hoạt động') }}</label>
                            <div class="col-md-6">
                            <div>                                                                                   
                                <input class="user-hoatdong" type="radio" name="hoatdong" value="1"
                                @if ($hocviens->hoatdong==1)
                                                    checked="true"
                                                    @endif>Hoạt động
                                <input class="user-hoatdong" type="radio" name="hoatdong" value="0"
                                @if ($hocviens->hoatdong==0)
                                                    checked="true"
                                                    @endif>Không hoạt động                          
                            </div>
                                @if ($errors->has('hoatdong'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hoatdong') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                                     
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a type="" href="admin/hocvien/list" class="btn btn-secondary">Trở về</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection