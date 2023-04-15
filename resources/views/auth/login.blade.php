@extends('client.layout.master')
@section('content')
<div class="row pb400">
                    <div class="col-md-8 col-xs-12">
                        <div class="card">
                            <div class="card-header">{{ __('Đăng nhập') }}</div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
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
                                    <div class="form-group row mb-0 wrap-btn">
                                        <div class="">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Đăng nhập') }}
                                            </button>
                                            <a class="btn btn-warning" href="/">
                                                Hủy
                                            </a>
                                            <a class="btn btn-danger" href="/guimaxacnhanqmk">
                                                {{ __('Quên mật khẩu?') }}
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

@endsection