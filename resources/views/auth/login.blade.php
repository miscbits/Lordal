@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login to continue') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <a href="{{ url('/auth/github') }}" class="btn btn-primary btn-github"><i class="fa fa-github"></i> Student Login</a>
                            <a href="{{ url('/auth/google') }}" class="btn btn-primary btn-google"><i class="fa fa-google"></i> Staff Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
