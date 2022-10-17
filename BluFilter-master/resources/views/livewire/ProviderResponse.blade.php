<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <?php
                    $user = $userrequest->user;
                    $request_details = $userrequest;
                    $service_provider = $userrequest->service_provider;
                ?>
                <div class="form-group row">
                    <h5> {{ __('messages.request.request_information') }}</h5>
                </div>

                <div class="form-group row">
                    <label class="col-sm-1 col-form-label">{{ __('messages.users.name') }}</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="text" value="{{ $user->name }}" readonly="">
                    </div>

                    <label class="col-sm-1 col-form-label">{{ __('messages.general.email') }}</label>
                    <div class="col-sm-5">
                        <input class="form-control" value="{{ $user->email }}" readonly="">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">{{ __('messages.request.note') }}</label>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <textarea class="form-control" rows="10" readonly=""
                            style="overflow-y: scroll;">{{ $request_details->Request_Comment }}</textarea>
                    </div>
                </div>

                @if ($request_details->image)
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('messages.request.image') }}</label>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <img src="{{ $request_details->image }}" alt="">
                        </div>
                    </div>
                @endif

                <hr/>
                <div class="form-group row">
                    <h5> {{ __('messages.response.response_information') }}</h5>
                </div>

                <div class="form-group row">
                    <label class="col-sm-1 col-form-label">{{ __('messages.service_provider.name') }}</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="text" value="{{ $service_provider->name }}" readonly="">
                    </div>

                    <label class="col-sm-1 col-form-label">{{ __('messages.service_provider.email') }}</label>
                    <div class="col-sm-5">
                        <input class="form-control" value="{{ $service_provider->email }}" readonly="">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">{{ __('messages.response.response_reply')}}</label>
                </div>

                @if ($service_provider_response)
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <textarea  class="form-control"  readonly="" rows="10"
                                style="resize: none; overflow-y: scroll;">{{ $service_provider_response->Response_Comment}}</textarea>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
    <!-- end col -->



</div>
<!-- end row -->
