<div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <form wire:submit.prevent="sendNotification">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">@lang('messages.notifications.title')</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" wire:model="title" id="title">
                                @error('title') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-sm-2 col-form-label">@lang('messages.notifications.message')</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" wire:model="message" id="message">
                                @error('message') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image_url" class="col-sm-2 col-form-label">@lang('messages.notifications.image_url')</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="url" wire:model="image_url" id="image_url">
                                @error('image_url') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 ">
                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                    @lang('messages.notifications.create')
                                </button>
                            </div>
                        </div>

                    </form>
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
