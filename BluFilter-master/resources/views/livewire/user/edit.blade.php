<div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <form wire:submit.prevent="updateUser">
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

                            <label for="password_confirmation" class="col-sm-2 col-form-label">
                                @lang('messages.general.confirm_password')
                            </label>
                            <div class="col-sm-4">
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
                            <label for="locale" class="col-sm-2 col-form-label">@lang('messages.users.country')</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="locale" wire:change="like()" wire:model="country">
                                    <option >{{__('messages.countries.select_country')}}</option>

                                @foreach ($countries as $country )
                                <option value="{{ $country->Country_ID}}">{{ $country->country_name}}</option>
                                @endforeach

                                </select>
                                @error('locale') <span class="error">{{ $message }}</span> @enderror
                            </div>
                              <label class="col-sm-2 col-form-label"
                                    for="user_role">@lang('messages.users.city')</label>
                                @if ($show != false)
                               <div class="col-sm-4">
                                    <select class="form-control" wire:model="City">
                                <option >{{__('messages.countries.select_city')}}</option>

                                        @foreach ($cities as $city )
                                        <option value="{{ $city->City_ID}}">{{ $city->city_name}}</option>
                                        @endforeach

                                    </select>
                                    @error('City') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                @endif
                        </div>


                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">@lang('messages.general.phone')</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="phone" wire:model="phone"/>
                                @error('phone') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <label for="bio" class="col-sm-2 col-form-label">@lang('messages.users.bio')</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="bio" wire:model="bio"/>
                                @error('bio') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="address">@lang('messages.users.address')</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="address" wire:model="address"/>
                                @error('address') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <label class="col-sm-2 col-form-label" for="image">@lang('messages.general.profile_img')</label>
                            <div class="col-sm-4">
                                <livewire:misc.image-browser/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="views">@lang('messages.general.views')</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="views" value="{{ $views ?? '0' }}" readonly/>
                            </div>

                            <label class="col-sm-2 col-form-label">@lang('messages.general.profile_img')</label>
                            <div class="col-sm-4">
                                <img src="@if($image)
                                            {{ '/storage/images/thumbnails/' . $image }}
                                          @elseif($profile_image)
                                            {{ $profile_image }}
                                          @else
                                            {{ 'https://via.placeholder.com/170x100.png/0033bb?text=No%20Image' }}
                                          @endif"

                                         class="img-thumbnail"
                                         width="150px" height="70" alt="{{ __('messages.Image') }}" id="profile_preview">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                    @lang('messages.users.update_profile')
                                </button>
                                <a href="{{ route('user.index') }}" class="btn btn-secondary waves-effect m-l-5">
                                    @lang('messages.general.cancel')
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
