@extends('client.layout.master')
@section('content')
<div class="row">
    <div class="col-md-8 col-xs-12 guimaxacnhan">
        <div class="row">
            <div class="card">
                <div class="card-head">
                    <h3>Đăng kí</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="/guimaxacnhan" aria-label="{{ __('Gửi mã xác nhận') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right dkemail">{{ __('Nhập email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="btn-dk">
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
@endsection