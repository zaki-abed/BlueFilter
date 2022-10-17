<div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <form wire:submit.prevent="submit">

                        <div class="form-group row">
                            <label for="country_name_ar"
                                class="col-sm-2 col-form-label">@lang('messages.countries.country_name_ar')</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" wire:model.debounce.500ms="country_name_ar"
                                    id="country_name_ar">
                                @error('country_name_ar') <span
                                    class="error">@lang('messages.countries.country_name_ar_error')</span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brief"
                                class="col-sm-2 col-form-label">@lang('messages.countries.country_name_en')</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" wire:model.debounce.500ms="country_name_en"
                                    id="country_name_en">
                                @error('country_name_en') <span
                                    class="error">@lang('messages.countries.country_name_en_error')</span> @enderror
                            </div>
                        </div>
<div class="form-group row">
                            <div class="col col-sm-offset-2">
                            </div>
                        </div>

                        <div class="form-group row ml-2">
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                @lang('messages.general.edit')
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

</div>
