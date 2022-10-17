@extends('layouts.normal')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive b-0 fixed-solution" data-pattern="priority-columns">
                        <table id="tech-companies-1" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('messages.users.name')</th>
                                    <th>@lang('messages.general.email')</th>
                                    <th>@lang('messages.users.address')</th>
                                    <th>@lang('messages.general.views')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ Str::words($user->address ?? __('messages.general.n/a'), 6, '...') }}</td>
                                        <td>{{ $user->views->click_count ?? 0 }}</td>
                                    </tr>
                                    @if ($loop->last)
                                        <tr>
                                            <td colspan="5" class="text-center">{{ $users->links() }}</td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr><td colspan="5" class="text-center">@lang('messages.users.no_users')</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



