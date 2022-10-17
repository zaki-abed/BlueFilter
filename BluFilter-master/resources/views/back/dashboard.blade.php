@extends('layouts.normal')

@section('content')
    <div class="row">

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-account-group bg-primary  text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">@lang('messages.dashboard.total_customers')</h5>
                    </div>
                    <h3 class="mt-4">{{ $total_customers }}</h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="fa fa-list-alt bg-warning text-white" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5 class="font-16">@lang('messages.dashboard.total_categories')</h5>
                    </div>
                    <h3 class="mt-4">{{ $total_categories }}</h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-comment-question bg-danger text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">@lang('messages.dashboard.total_queries')</h5>
                    </div>
                    <h3 class="mt-4">{{ $total_queries }}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
