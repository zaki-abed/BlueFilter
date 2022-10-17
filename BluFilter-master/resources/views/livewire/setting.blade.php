<div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" wire:click="$emit('tabChanged','general')">
                            <a class="nav-link {{ $this->selectedTab == 'general' ? 'active' : '' }}" data-toggle="tab"
                                href="#general" role="tab">
                                <span class="d-block d-md-block">@lang('messages.general.general')</span>
                            </a>
                        </li>
                        <li class="nav-item" wire:click="$emit('tabChanged','mail')">
                            <a class="nav-link {{ $this->selectedTab == 'mail' ? 'active' : '' }}" data-toggle="tab"
                                href="#mail" role="tab">
                                <span class="d-block d-md-block">@lang('messages.general.email')</span>
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane p-3 {{ $this->selectedTab == 'general' ? 'active' : '' }}" id="general"
                            role="tabpanel">

                            <form wire:submit.prevent="updateGeneral">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"
                                        for="site_name">@lang('messages.settings.general.site_name')</label>
                                    <div class="col-sm-3">
                                        <input id="site_name" type="text" class="form-control"
                                            wire:model.debounce.500ms="general.site_name" />
                                        @error('general.site_name') <span
                                            class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <label class="col-sm-2 col-form-label"
                                        for="site_url">@lang('messages.settings.general.site_url')</label>
                                    <div class="col-sm-5">
                                        <input type="url" class="form-control" id="site_url"
                                            wire:model.debounce.500ms="general.site_url" />
                                        @error('general.site_url') <span
                                            class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"
                                        for="site_locale">@lang('messages.settings.general.site_locale')</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" id="site_locale"
                                            wire:model.debounce.500ms="general.site_locale">
                                            <option value="en">@lang('messages.lang.en')</option>
                                            <option value="ar">@lang('messages.lang.ar')</option>
                                        </select>
                                        @error('general.site_locale') <span
                                            class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <label class="col-sm-2 col-form-label" for="site_description">
                                        @lang('messages.settings.general.site_description')
                                    </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="site_description"
                                            wire:model.debounce.500ms="general.site_description" />
                                        @error('general.site_description') <span
                                            class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="coming_soon">
                                        @lang('messages.settings.general.coming_soon_page')
                                    </label>
                                    <div class="col-sm-3">
                                        <select class="form-control" id="coming_soon"
                                            wire:model.debounce.500ms="general.coming_soon">
                                            <option value="false">@lang('messages.general.disabled')</option>
                                            <option value="true">@lang('messages.general.enabled')</option>
                                        </select>
                                        @error('general.coming_soon') <span
                                            class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <label for="back_date" class="col-sm-2 col-form-label">
                                        @lang('messages.settings.general.coming_back_date')
                                    </label>
                                    <div class="col-sm-5">
                                        <input class="form-control" type="datetime-local" id="back_date"
                                            wire:model.debounce.500ms="general.back_date">
                                        @error('general.back_date') <span
                                            class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="items_per_page">
                                        @lang('messages.settings.general.items_per_page')
                                    </label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control"
                                            wire:model.debounce.500ms="general.items_per_page" id="items_per_page" />
                                        @error('general.items_per_page') <span
                                            class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <label class="col-sm-2 col-form-label" for="site_author">
                                        @lang('messages.general.author')</label>
                                    <div class="col-sm-5">
                                        <input type="text" id="site_author" class="form-control"
                                            wire:model.debounce.500ms="general.site_author" />
                                        @error('general.site_author') <span
                                            class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                            @lang('messages.settings.general.save')
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane p-3 {{ $this->selectedTab == 'mail' ? 'active' : '' }}" id="mail"
                            role="tabpanel">

                            <form wire:submit.prevent="updateMail">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"
                                        for="host">@lang('messages.general.host')</label>
                                    <div class="col-sm-4">
                                        <input id="host" type="text" class="form-control"
                                            wire:model.debounce.500ms="mail.host" />
                                        @error('mail.host') <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 col-form-label"
                                        for="username">@lang('messages.general.username')</label>
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" id="username"
                                            wire:model.debounce.500ms="mail.username" />
                                        @error('mail.username') <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"
                                        for="password">@lang('messages.general.password')</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="password"
                                            wire:model.debounce.500ms="mail.password" />
                                        @error('mail.password') <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 col-form-label"
                                        for="port">@lang('messages.general.port')</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" id="port"
                                            wire:model.debounce.500ms="mail.port" />
                                        @error('mail.port') <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"
                                        for="encryption">@lang('messages.general.encryption')</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="encryption" data-id=""
                                            wire:model.debounce.500ms="mail.encryption">
                                            <option value="ssl">@lang('messages.general.ssl')</option>
                                            <option value="tls">@lang('messages.general.tls')</option>
                                        </select>
                                        @error('mail.encryption') <span
                                            class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <label class="col-sm-2 col-form-label" for="reply_to">
                                        @lang('messages.settings.mail.reply_to')
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="reply_to"
                                            wire:model.debounce.500ms="mail.reply_to" />
                                        @error('mail.reply_to') <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                            @lang('messages.settings.mail.save')
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('additional_scripts')
        <script>
            window.addEventListener('setting-updated', event => {
                successAlert(event.detail.message);
                // errorAlert(error.responseJSON.message);
            });
        </script>
    @endsection
</div>
