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
                                <th>@lang('messages.general.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ Str::words($user->address ?? __('messages.general.n/a'), 5, '...') }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button data-id="{{$user->id}}" type="button"
                                                        class="btn btn-success waves-effect waves-light approve-request">
                                                    @lang('messages.users.approve')
                                                    <i class="far fas fa-check-circle"></i>
                                                </button>
                                                <button data-id="{{$user->id}}" type="button"
                                                        class="btn btn-danger waves-effect waves-light reject-request">
                                                    @lang('messages.users.reject')
                                                    <i class="far fas fa-times-circle"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @if ($loop->last)
                                        <tr>
                                            <td colspan="4" class="text-center">{{ $users->links() }}</td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr><td colspan="4" class="text-center">@lang('messages.users.no_requests')</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additional_scripts')
    <script>
        const approveURL = '{{ route('user.requests.approve') }}';
        const rejectURL = '{{ route('user.requests.reject') }}';

        $(document).ready(function (){

            $('.approve-request').on('click', function (){
                const user_id = $(this).data('id');
                updateUser(user_id, approveURL);
            });

            $('.reject-request').on('click', function (){
                const user_id = $(this).data('id');
                updateUser(user_id, rejectURL);
            });
        });

        function updateUser(user_id, targetURL) {
            swal({
                title: '{{ __('messages.general.wait') }}',
                text: "{{ __('messages.users.sending_email') }}",
                onOpen: () => {
                    swal.showLoading();

                    $.ajax({
                        url: targetURL,
                        type: "POST",
                        data: {
                            id: user_id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            okWithRedirect(response.message, response.redirect);
                        },
                        error: function (err) {
                            errorAlert('{{ __('messages.general.went_wrong') }}');
                        }
                    });
                }
            });
        }
    </script>
@endsection
