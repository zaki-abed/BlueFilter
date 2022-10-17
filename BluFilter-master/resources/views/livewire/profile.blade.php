<div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <form wire:submit.prevent="updateUser">

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">
                                @lang('messages.users.name')
                            </label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" id="name" wire:model="name">
                                @error('name') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <label for="email" class="col-sm-2 col-form-label">
                                @lang('messages.general.email')
                            </label>
                            <div class="col-sm-4">
                                <input class="form-control" type="email"  id="email" wire:model="email">
                                @error('email') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">
                                @lang('messages.general.password')
                            </label>
                            <div class="col-sm-4">
                                <input class="form-control" type="password" id="password" wire:model="password">
                                @error('password') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <label for="password_confirmation" class="col-sm-2 col-form-label">
                                @lang('messages.general.confirm_password')
                            </label>
                            <div class="col-sm-4">
                                <input class="form-control" type="password" id="password_confirmation" wire:model="password_confirmation">
                                @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">@lang('messages.general.profile_img')</label>
                            <div class="col-sm-6">
                                <livewire:misc.image-browser/>
                            </div>

                            <label for="locale" class="col-sm-2 col-form-label">@lang('messages.users.locale')</label>
                            <div class="col-sm-2">
                                <select class="form-control"  id="locale" wire:model="locale">
                                    <option value="ar">@lang('messages.lang.ar')</option>
                                    <option value="en">@lang('messages.lang.en')</option>
                                </select>
                                @error('locale') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group row ml-2">
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                @lang('messages.users.update_profile')
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <!-- end row -->
    <div id="imageBrowserModel" class="modal fade bs-example-modal-center" tabindex="-1"
         role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body" id="browserIframe"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="selectBrowserImage">Select</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
