<div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <address>
                        <b>@lang('messages.users.name'):</b>{{ $user->name }}<br>
                        <b>@lang('messages.general.email'):</b>{{ $user->email }}<br>
                        <b>@lang('messages.users.role'):</b>@lang('messages.users.type.'.$user->type)<br>
                    </address>
                </div>
                <div class="col-6 text-right">
                    <img src="{{ $user->profile_thumbnail ?? 'https://via.placeholder.com/200x100.png?text=No%20Image' }}" class="img-thumbnail" width="200px" height="100px" alt="@lang('messages.general.profile_img')">
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="p-2">
                    <h3 class="panel-title font-20"><strong>@lang('messages.users.logs')</strong></h3>
                </div>
                <div>
                    <div class="table-responsive b-0 fixed-solution" data-pattern="priority-columns">
                        <table id="tech-companies-1" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('messages.users.login_time')</th>
                                    <th>@lang('messages.users.login_ip')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($logs as $log)
                                    <tr>
                                        <td>{{ $log->created_at }}</td>
                                        <td>{{ $log->ip }}</td>
                                    </tr>
                                    @if ($loop->last)
                                        <tr>
                                            <td colspan="2" class="text-center">{{ $logs->links() }}</td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr><td colspan="2" class="text-center">@lang('messages.users.no_logs')</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
