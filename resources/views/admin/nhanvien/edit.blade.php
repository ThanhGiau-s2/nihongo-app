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
                <form action="admin/nhanvien/edit/{{$nhanviens->id}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Sửa nhân viên</h5>                                
                    </div>
                    <div class="modal-body">                            
                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="ten" value="{{$nhanviens->ten}}" required autofocus>

                                @if ($errors->has('ten'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ten') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$nhanviens->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                            <div class="col-md-6">
                                <!-- <input id="role" type="text" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="account" value="{{ old('role') }}" required autofocus> -->
                                <select name="quyen" class="form-control select-option" id="parent_id">
                                    <option value="{{$nhanviens->quyen}}">{{$nhanviens->quyen}}</option>
                                    @for ($d=0; $d <= 4; $d++)
                                        <option value="{{$d}}"
                                        >{{$d}}</option>
                                    @endfor   
                                </select>
                                @if ($errors->has('quyen'))
                                    <span class="invalid-feedback" quyen="alert">
                                        <strong>{{ $errors->first('quyen') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('DOB') }}</label>
                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control{{ $errors->has('ngaysinh') ? ' is-invalid' : '' }}" name="ngaysinh" value="{{$nhanviens->ngaysinh}}" required>
                                @if ($errors->has('ngaysinh'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ngaysinh') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                            <div class="col-md-6">
                            <div>                                                                                   
                                <input class="user-gioitinh" type="radio" name="gioitinh" value="1"
                                @if ($nhanviens->gioitinh==1)
                                                    checked="true"
                                                    @endif>Nam
                                <input class="user-gioitinh" type="radio" name="gioitinh" value="0"
                                @if ($nhanviens->gioitinh==0)
                                                    checked="true"
                                                    @endif>Nữ                          
                            </div>
                                @if ($errors->has('gioitinh'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gioitinh') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   
                        <div class="form-group row">
                            <label for="active" class="col-md-4 col-form-label text-md-right">{{ __('Active') }}</label>
                            <div class="col-md-6">
                            <div>                                                                                   
                                <input class="user-hoatdong" type="radio" name="hoatdong" value="1"
                                @if ($nhanviens->hoatdong==1)
                                                    checked="true"
                                                    @endif>Hoạtđộng
                                <input class="user-hoatdong" type="radio" name="hoatdong" value="0"
                                @if ($nhanviens->hoatdong==0)
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
                        <a type="" href="admin/nhanvien/list" class="btn btn-secondary">Trở về</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection