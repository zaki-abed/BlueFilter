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

                <form class="form-horizontal m-t-30" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <div class="col-12">
                            <label for="email">@lang('messages.general.email')</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label>@lang('messages.general.password')</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="password-confirm">
                                @lang('messages.general.confirm_password')</label>

                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">
                                @lang('auth.reset')
                            </button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection
