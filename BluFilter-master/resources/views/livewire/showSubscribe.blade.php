<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="table-responsive b-0 fixed-solution" data-pattern="priority-columns">
                    <table id="tech-companies-1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                 <th>@lang('frontend.Subscribe_Date')</th>
                                <th>@lang('frontend.Subscribe_Name')</th>
                                <th>@lang('frontend.Subscribe_Email')</th>
                                <th>@lang('messages.general.action')</th>


                            </tr>
                        </thead>
                        <tbody>
                        @forelse($subscribes as $singlesubscribe)
                            <tr>
                               <td>{{  \Carbon\Carbon::parse($singlesubscribe->created_at)->format('d/m/Y')}}</td>

                                <td>{{ $singlesubscribe->subscribe_name }}</td>
                                <td>{{ $singlesubscribe->subscribe_email }}</td>
                                <td>
                                    <div class="btn-group">
                                        @include('livewire.partials.delete-button', ['id' => $singlesubscribe->id])
                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr><td colspan="4" class="text-center">@lang('messages.subscriber.no_subscribe')</td></tr>
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
