<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="table-responsive b-0 fixed-solution" data-pattern="priority-columns">
                    <table id="tech-companies-1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>@lang('messages.request.date')</th>
                                <th>@lang('messages.request.user_request')</th>
                                <th>@lang('messages.request.service_provider')</th>
                                <th>@lang('messages.request.note')</th>
                                <th>@lang('messages.response.status')</th>
                                <th>@lang('messages.general.action')</th>


                            </tr>
                        </thead>
                        <tbody>
                            @forelse($service_provider_requests as $service_provider_request)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($service_provider_request->created_at)->format('d/m/Y') }}
                                </td>

                                <td>{{ $service_provider_request->user->name }}</td>
                                <td>{{ $service_provider_request->service_provider->name  }}</td>
                                <td>{{ $service_provider_request->Request_Comment }}</td>
                                <?php  $user_response = App\Models\ServiceProviderResponse::where('User_Request_ID' , $service_provider_request->Request_ID)->first()?>

                                <td>{{  $service_provider_request->status}}</td>
                               @if($user_response)  <td>
                                    <div class="btn-group">
                                        <a href="response/{{$service_provider_request->Request_ID}}"
                                            class="btn btn-sm btn-info show-more-buttton">
                                            <i class="mdi mdi-eye"></i>
                                        </a>

                                    </div>
                                </td>
                                @else
                                <td colspan="2">@lang('messages.response.no_response')</td>

                                @endif


                            </tr>

                            @empty
                            <tr>
                                <td colspan="6" class="text-center">@lang('messages.request.no_request')</td>
                            </tr>
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
