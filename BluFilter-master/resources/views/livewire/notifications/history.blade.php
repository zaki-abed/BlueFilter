<div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive b-0 fixed-solution" data-pattern="priority-columns">
                        <table id="tech-companies-1" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>@lang('messages.notifications.title')</th>
                                <th>@lang('messages.notifications.message')</th>
                                <th>@lang('messages.general.image')</th>
                                <th>@lang('messages.general.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($notifications as $notification)
                                    <tr>
                                        <td>{{ Str::words($notification->title, 5, '...') }}</td>
                                        <td>{{ Str::words($notification->message,5, '...') }}</td>
                                        <td>
                                            <img style="width: 70px;"
                                                 src="{{ $notification->image_url ?? 'https://via.placeholder.com/170x100.png/0033bb?text=No%20Image' }}" />
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" wire:click="resendNotification({{$notification->id}})"
                                                    type="button" {{ !$can_resend  ? 'disabled' : '' }}>
                                                    <i class="far fa-paper-plane"></i>
                                                @lang('messages.notifications.resend')
                                            </button>
                                        </td>
                                    </tr>
                                    @if ($loop->last)
                                        <tr>
                                            <td colspan="4" class="text-center">{{ $notifications->links() }}</td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr><td colspan="4" class="text-center">@lang('messages.notifications.no_history')</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    @section('additional_scripts')
        <script>
            window.addEventListener('notification-sent', event => {
                successAlert(event.detail.message);
            });

            window.addEventListener('notification-error', event => {
                errorAlert(event.detail.message);
            });
        </script>
    @endsection
</div>
