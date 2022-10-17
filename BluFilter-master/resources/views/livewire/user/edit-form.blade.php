<form wire:submit.prevent="updateUser">

    @if($editUser)
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">@lang('messages.users.name')</label>
            <div class="col-sm-4">
                <input class="form-control" type="text" id="name" wire:model="name">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <label for="email" class="col-sm-1 col-form-label">@lang('messages.general.email')</label>
            <div class="col-sm-5">
                <input class="form-control" type="email"  id="email" wire:model="email">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">@lang('messages.general.password')</label>
            <div class="col-sm-4">
                <input class="form-control" type="password" id="password" wire:model="password">
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>

            <label for="password_confirmation" class="col-sm-3 col-form-label">
                @lang('messages.general.confirm_password')
            </label>
            <div class="col-sm-3">
                <input class="form-control" type="password" id="password_confirmation" wire:model="password_confirmation">
                @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="locale" class="col-sm-2 col-form-label">@lang('messages.users.locale')</label>
            <div class="col-sm-4">
                <select class="form-control"  id="locale" wire:model="locale">
                    <option value="ar">@lang('messages.lang.ar')</option>
                    <option value="en">@lang('messages.lang.en')</option>
                </select>
                @error('locale') <span class="error">{{ $message }}</span> @enderror
            </div>

            <label class="col-sm-2 col-form-label" for="type">@lang('messages.users.role')</label>
            <div class="col-sm-4">
                <select class="form-control" id="type" wire:model="type">
                    <option value="customer">@lang('messages.users.type.customer')</option>
                    <option value="admin">@lang('messages.users.type.admin')</option>
                </select>
                @error('type') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">@lang('messages.general.phone')</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="phone" wire:model="phone"/>
                @error('phone') <span class="error">{{ $message }}</span> @enderror
            </div>

        </div>

        <div class="form-group row">

            <label class="col-sm-2 col-form-label" for="image">@lang('messages.general.profile_img')</label>
            <div class="col-sm-4">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" wire:model="image" accept="image/*">
                    <label class="custom-file-label" for="image">@lang('messages.general.choose_file')</label>
                </div>
                @error('image') <span class="error">{{ $message }}</span> @enderror
                <div wire:loading wire:target="image">@lang('messages.status.uploading')</div><br>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="address">@lang('messages.users.address')</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="address" wire:model="address"/>
                @error('address') <span class="error">{{ $message }}</span> @enderror
            </div>

            <label for="bio" class="col-sm-2 col-form-label">@lang('messages.users.bio')</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="bio" wire:model="bio"/>
                @error('bio') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group">
            <div>
                <button type="submit" class="btn btn-success waves-effect waves-light">
                    @lang('messages.users.update_profile')
                </button>
                <button type="reset" class="btn btn-secondary waves-effect m-l-5" data-dismiss="modal" aria-label="Close">
                    @lang('messages.general.cancel')
                </button>
            </div>
        </div>
    @endif
</form>
