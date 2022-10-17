<div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <form wire:submit.prevent="submit">

                        <div class="form-group row">
                            <label for="city_name_ar"
                                class="col-sm-2 col-form-label">@lang('messages.cities.city_name_ar')</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" wire:model.debounce.500ms="city_name_ar"
                                    id="city_name_ar">
                                @error('city_name_ar') <span
                                        class="error">@lang('messages.cities.city_name_ar_error')</span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city_name_en"
                                class="col-sm-2 col-form-label">@lang('messages.cities.city_name_en')</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" wire:model.debounce.500ms="city_name_en"
                                    id="city_name_en">
                                @error('city_name_ar') <span
                                        class="error">@lang('messages.cities.city_name_en_error')</span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">  <label for="brief"
                            class="col-sm-2 col-form-label">@lang('messages.cities.countries')</label>

                            <div class="col-sm-10">

                            <select class="js-example-basic-multiple form-control" name="country" wire:model.debounce.500ms="country" >
                                <option> @lang('messages.cities.country_select')
                                </option>
                                @foreach ($countries as $country )
                             <option value="{{ $country->Country_ID }}" > {{ $country->country_name}}</option>
                             @endforeach
                            </select>
                            @error('country') <span
                            class="error">@lang('messages.cities.country_error')</span> @enderror

                        </div>
                    </div>
                        <div class="form-group row ml-2">
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                @lang('messages.general.create')
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div id="imageBrowserModel" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
