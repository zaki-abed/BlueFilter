@extends('layouts.auth')

@section('title', $title)

@section('wrapper-page')
    <div class="wrapper-page">
        <div class="card card-pages shadow-none">
            <div class="card-body">
                <div class="text-center m-t-0 m-b-15">
                    <a href="/" class="logo logo-admin"><img src="{{ asset('back/images/logo-dark.png') }}" alt="" height="24"></a>
                </div>

                <h5 class="font-18 text-center">@lang('auth.reset')</h5>

                <form class="form-horizontal m-t-30" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session('status') }}
                            </div>
                        @else
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                @lang('auth.recovery_tagline')
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label>@lang('messages.general.email')</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">
                                @lang('auth.send_reset_link')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
