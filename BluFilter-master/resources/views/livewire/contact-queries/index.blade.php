<div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive b-0 fixed-solution" data-pattern="priority-columns">
                        <table id="tech-companies-1" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>@lang('messages.users.name')</th>
                                    <th>@lang('messages.general.email')</th>
                                    <th>@lang('messages.general.subject')</th>
                                    <th>@lang('messages.general.received')</th>
                                    <th>@lang('messages.general.seen')</th>
                                    <th>@lang('messages.general.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($queries as $query)
                                    <tr>
                                        <td class="text-center"><input wire:model="massDestroyAll" type="checkbox" value="{{ $query->id }}" class="massDestroy" name="massDestroy[]"></td>
                                        <td>{{ $query->name }}</td>
                                        <td>{{ $query->email }}</td>
                                        <td>{{ Str::words($query->subject, 4, '...') }}</td>
                                        <td>{{ $query->created_at }}</td>
                                        <td>{{ $query->read }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button wire:click="$emit('editItem',{{$query->id}})" class="btn btn-sm btn-primary">
                                                    @lang('messages.general.read')
                                                </button>

                                                @include('livewire.partials.delete-button', ['id' => $query->id])
                                            </div>

                                        </td>
                                    </tr>
                                    @if ($loop->last)
                                        <tr>
                                            <td colspan="6" class="text-center">{{ $queries->links() }}</td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr><td colspan="6" class="text-center">@lang('messages.general.no_query')</td></tr>
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
    <!-- User update model -->
    <div class="col-sm-6 col-md-3 m-t-30">
        <div id="contactQueryModal" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
             aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0">@lang('messages.general.contact_query')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <livewire:contact-queries.details-modal />
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!-- /.modal -->
</div>
<div class="d-flex"><button id="massDestroyButton" class="btn btn-danger my-2" disabled>@lang('messages.general.deleteAll')</button></div>