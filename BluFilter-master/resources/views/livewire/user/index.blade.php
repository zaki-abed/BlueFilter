<div class="row">
    <div class="col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="table-responsive b-0 fixed-solution" data-pattern="priority-columns">
                    <table id="tech-companies-1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>@lang('messages.users.name')</th>
                                <th>@lang('messages.general.email')</th>
                                <th>@lang('messages.users.address')</th>
                                <th>@lang('messages.general.type')</th>
                                <th>@lang('messages.general.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td class="text-center"><input wire:model="massDestroyAll" type="checkbox" value="{{ $user->id }}" class="massDestroy" name="massDestroy[]"></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ Str::words($user->address ?? __('messages.general.n/a'), 4, '...') }}</td>
                                    <td>@lang('messages.users.type.'. $user->type)</td>
                                    <td>
                                        <div class="btn-group">
                                            @include('livewire.partials.delete-button', ['id' => $user->id])
                                            @include('livewire.partials.edit-button', ['href' => route('user.edit', ['id' => $user->id])])
                                            @include('livewire.partials.view-button', ['href' => route('user.history', ['id' => $user->id])])
                                        </div>
                                    </td>
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
<div class="d-flex"><button id="massDestroyButton" class="btn btn-danger my-2" disabled>@lang('messages.general.deleteAll')</button></div>