@extends('back.auth.layout.app')

@section('title')
    <title>{{ config('app.name', 'Laravel') }} | Admin Login</title>
@endsection

@section('wrapper-page')
    <div class="wrapper-page">
        <div class="card card-pages shadow-none">

            <div class="card-body">
                <div class="text-center m-t-0 m-b-15">
                    <a href="/" class="logo logo-admin"><img src="{{ asset('storage/admin/images/logo-dark.png') }}" alt="" height="24"></a>
                </div>
                <h5 class="font-18 text-center">Reset Password</h5>

                <form class="form-horizontal m-t-30" action="index.html">

                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Enter your <b>Email</b> and instructions will be sent to you!
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label>Email</label>
                            <input class="form-control" type="text" required="" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Send Email</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- END wrapper -->
@endsection
