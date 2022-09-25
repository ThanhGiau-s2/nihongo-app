@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Đăng kí nhân viên') }}</div>

                <div class="card-body">
                    <form method="POST" action="register" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tên') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="ten" value="{{ old('ten') }}" required autofocus>

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
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Ngày sinh') }}</label>
                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control{{ $errors->has('ngaysinh') ? ' is-invalid' : '' }}" name="ngaysinh" value="{{ old('ngaysinh') }}" required>
                                @if ($errors->has('ngaysinh'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ngaysinh') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Giới tính') }}</label>
                            <div class="col-md-6">
                            <div>                                                                                   
                                <input class="user-gioitinh" type="radio" name="gioitinh" value="1">Nam
                                <input class="user-gioitinh" type="radio" name="gioitinh" value="0">Nữ                          
                            </div>
                                @if ($errors->has('gioitinh'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gioitinh') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   
                        <div class="form-group row">
                            <label for="active" class="col-md-4 col-form-label text-md-right">{{ __('Hoạt động') }}</label>
                            <div class="col-md-6">
                            <div>                                                                                   
                                <input class="user-hoatdong" type="radio" name="hoatdong" value="1">Hoạt động
                                <input class="user-hoatdong" type="radio" name="hoatdong" value="0">Không hoạt động                          
                            </div>
                                @if ($errors->has('hoatdong'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hoatdong') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Nhập lại mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đăng kí') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
