@extends('client.layout.master')
@section('content')   
    <div class="col-md-6 col-6 nhapmaxacnhan">
        <div class="row">
            <div class="card">
                <div class="card-head">
                    <h3>Nhập mã xác nhận</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="/nhapmaxacnhanqmk" aria-label="{{ __('Nhập mã xác nhận') }}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right dkemail">{{ __('Nhập mã xác nhận') }}</label>
                            <div class="col-md-6">
                                <input type="hidden" name="email" value="{{$email}}"/>  
                                <input id="makichhoat" type="makichhoat" class="form-control{{ $errors->has('makichhoat') ? ' is-invalid' : '' }}" name="makichhoat" value="{{ old('makichhoat') }}" required autofocus>
                                @if ($errors->has('makichhoat'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('makichhoat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="btn-dk">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Xác nhận') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection