<div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <ul class="nav nav-tabs" role="tablist">

                        <li class="nav-item" wire:click="$emit('tabChanged','homepage')">
                            <a class="nav-link  {{ $this->selectedTab == 'homepage' ? 'active' : '' }}"
                                data-toggle="tab" href="#homepage" role="tab">
                                <span class="d-block d-md-block">@lang('messages.general.homepage')</span>
                            </a>
                        </li>
                        <li class="nav-item" wire:click="$emit('tabChanged','howtouse')">
                            <a class="nav-link {{ $this->selectedTab == 'howtouse' ? 'active' : '' }}"
                                data-toggle="tab" href="#howtouse" role="tab">
                                <span class="d-block d-md-block">@lang('frontend.Steps_Title')</span>
                            </a>
                        </li>
                        <li class="nav-item" wire:click="$emit('tabChanged','vision')">
                            <a class="nav-link {{ $this->selectedTab == 'vision' ? 'active' : '' }}" data-toggle="tab"
                                href="#vision" role="tab">
                                <span class="d-block d-md-block">@lang('messages.general.vision')</span>
                            </a>
                        </li>
                        <li class="nav-item" wire:click="$emit('tabChanged','features')">
                            <a class="nav-link {{ $this->selectedTab == 'features' ? 'active' : '' }}"
                                data-toggle="tab" href="#features" role="tab">
                                <span class="d-block d-md-block">@lang('messages.general.features')</span>
                            </a>
                        </li>

                        <li class="nav-item" wire:click="$emit('tabChanged','aboutus')">
                            <a class="nav-link {{ $this->selectedTab == 'aboutus' ? 'active' : '' }}"
                                data-toggle="tab" href="#aboutus" role="tab">
                                <span class="d-block d-md-block">@lang('frontend.about_us')</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">


                        <div class="tab-pane p-3  {{ $this->selectedTab == 'homepage' ? 'active' : '' }}"
                            id="homepage" role="tabpanel">

                            <form wire:submit.prevent="updateHomepage">
                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label"
                                        for="title_en">@lang('messages.general.homepage_title_en')</label>
                                    <div class="col-sm-4">
                                        <textarea id="title_en" style="height: auto" type="text" class="form-control"
                                            wire:model.debounce.500ms="homepage.Home_Page_Title_En"> </textarea>
                                        @error('homepage.Home_Page_Title_En') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label class="col-sm-2 col-form-label"
                                        for="title_en">@lang('messages.general.homepage_title_ar')</label>
                                    <div class="col-sm-4">
                                        <textarea id="title_ar" style="height: auto" type="text" class="form-control"
                                            wire:model.debounce.500ms="homepage.Home_Page_Title_Ar"> </textarea>
                                        @error('homepage.Home_Page_Title_Ar') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label"
                                        for="title_en">@lang('messages.general.homepage_desc_en')</label>
                                    <div class="col-sm-4">
                                        <textarea id="title_en" style="height: auto" type="text" class="form-control"
                                            wire:model.debounce.500ms="homepage.Home_Page_Description_En"> </textarea>
                                        @error('homepage.Home_Page_Description_En') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label class="col-sm-2 col-form-label"
                                        for="title_ar">@lang('messages.general.homepage_title_ar')</label>
                                    <div class="col-sm-4">
                                        <textarea id="title_ar" style="height: auto" type="text" class="form-control"
                                            wire:model.debounce.500ms="homepage.Home_Page_Description_Ar"> </textarea>
                                        @error('homepage.Home_Page_Description_Ar') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label"
                                        for="app_store">@lang('messages.general.App_Store_Link')</label>
                                    <div class="col-sm-4">
                                        <input id="app_store" style="height: auto" type="url" class="form-control"
                                            wire:model.debounce.500ms="homepage.App_Store" />
                                        @error('homepage.App_Store') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <label class="col-sm-2 col-form-label"
                                        for="google_app">@lang('messages.general.Google_App_Link')</label>
                                    <div class="col-sm-4">
                                        <input id="google_app" style="height: auto" type="url" class="form-control"
                                            wire:model.debounce.500ms="homepage.Google_App_Link" />
                                        @error('homepage.Google_App_Link') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>


                                </div>

                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label"
                                    for="download_counter">@lang('messages.general.download_counter')</label>
                                    <div class="col-sm-4">
                                        <input id="download_counter" style="height: auto" type="number" class="form-control"
                                            wire:model.debounce.500ms="homepage.download_counter" />
                                        @error('homepage.download_counter') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 col-form-label"
                                    for="email">@lang('messages.general.email')</label>
                                    <div class="col-sm-4">
                                        <input id="email" style="height: auto" type="email" class="form-control"
                                            wire:model.debounce.500ms="homepage.email" />
                                        @error('homepage.email') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label"
                                    for="phone">@lang('messages.general.phone')</label>
                                    <div class="col-sm-4">
                                        <input id="phone" style="height: auto" type="text" class="form-control"
                                            wire:model.debounce.500ms="homepage.phone" />
                                        @error('homepage.phone') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 col-form-label"
                                    for="facebook">@lang('messages.general.facebook')</label>
                                    <div class="col-sm-4">
                                        <input id="facebook" style="height: auto" type="text" class="form-control"
                                            wire:model.debounce.500ms="homepage.facebook" />
                                        @error('homepage.facebook') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label"
                                    for="youtube">@lang('messages.general.youtube')</label>
                                    <div class="col-sm-4">
                                        <input id="youtube" style="height: auto" type="text" class="form-control"
                                            wire:model.debounce.500ms="homepage.youtube" />
                                        @error('homepage.youtube') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                            @lang('messages.settings.homepage.save')
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="tab-pane p-3 {{ $this->selectedTab == 'howtouse' ? 'active' : '' }}"
                            id="howtouse" role="tabpanel">

                            <form wire:submit.prevent="updateHowtouse">
                                @for ($i = 1; $i < 5; $i++)
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label"
                                            for='step{{ $i }}En'>@lang('messages.general.step'.$i
                                            .'En')</label>
                                        <div class="col-sm-4">
                                            <textarea id='step{{ $i }}En' style="height: auto" type="text"
                                                class="form-control"
                                                wire:model.debounce.500ms='howtouse.howtouse{{ $i }}name_En'> </textarea>
                                            @error('howtouse.howtouse{{ $i }}name_En') <span
                                                    class="error">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <label class="col-sm-2 col-form-label"
                                            for='step{{ $i }}contentEn'>@lang('messages.general.step'.$i.'contentEn')</label>
                                        <div class="col-sm-4">
                                            <textarea id='step{{ $i }}contentEn' style="height: auto"
                                                type="text" class="form-control"
                                                wire:model.debounce.500ms='howtouse.howtouse{{ $i }}info_En'> </textarea>
                                            @error('howtouse.howtouse{{ $i }}info_En') <span
                                                    class="error">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label"
                                            for="step{{ $i }}Ar">@lang('messages.general.step'.$i
                                            .'Ar')</label>
                                        <div class="col-sm-4">
                                            <textarea id='step{{ $i }}Ar' style="height: auto" type="text"
                                                class="form-control"
                                                wire:model.debounce.500ms='howtouse.howtouse{{ $i }}name_Ar'> </textarea>
                                            @error('howtouse.howtouse{{ $i }}name_Ar') <span
                                                    class="error">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <label class="col-sm-2 col-form-label"
                                            for='step{{ $i }}contentAr'>@lang('messages.general.step'.$i.'contentAr')</label>
                                        <div class="col-sm-4">
                                            <textarea id='step{{ $i }}contentAr' style="height: auto"
                                                type="text" class="form-control"
                                                wire:model.debounce.500ms='howtouse.howtouse{{ $i }}info_Ar'> </textarea>
                                            @error('howtouse.howtouse{{ $i }}info_Ar') <span
                                                    class="error">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                @endfor


                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                            @lang('messages.settings.homepage.save')
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="tab-pane p-3 {{ $this->selectedTab == 'vision' ? 'active' : '' }}" id="vision"
                            role="tabpanel">

                            <form wire:submit.prevent="updateVision">

                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label"
                                        for='visiontitle'>@lang('messages.general.visiontitleEn')</label>
                                    <div class="col-sm-4">
                                        <textarea id='visiontitle' style="height: auto" type="text"
                                            class="form-control"
                                            wire:model.debounce.500ms='vision.Vision_Title_En'> </textarea>
                                        @error('vision.Vision_Title_En') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 col-form-label"
                                        for='visiontitle'>@lang('messages.general.visiontitle')</label>
                                    <div class="col-sm-4">
                                        <textarea id='visiontitle' style="height: auto" type="text"
                                            class="form-control"
                                            wire:model.debounce.500ms='vision.Vision_Title_Ar'> </textarea>
                                        @error('vision.Vision_Title_Ar') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>



                                </div>


                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label"
                                        for='visiontitle'>@lang('messages.general.visiontitleEn')</label>
                                    <div class="col-sm-4">
                                        <textarea id='visiontitle' style="height: auto" type="text"
                                            class="form-control"
                                            wire:model.debounce.500ms='vision.Vsion_Description_En'> </textarea>
                                        @error('vision.Vsion_Description_En') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 col-form-label"
                                        for='visiontitle'>@lang('messages.general.visiontitle')</label>
                                    <div class="col-sm-4">
                                        <textarea id='visiontitle' style="height: auto" type="text"
                                            class="form-control"
                                            wire:model.debounce.500ms='vision.Vsion_Description_Ar'> </textarea>
                                        @error('vision.Vsion_Description_Ar') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>



                                </div>




                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                            @lang('messages.settings.homepage.save')
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="tab-pane p-3 {{ $this->selectedTab == 'features' ? 'active' : '' }}"
                            id="features" role="tabpanel">

                            <form wire:submit.prevent="updateFeature">
                                <label class=" col-form-label"
                                    style="  font-weight: bold;">@lang('messages.general.mainFeature')</label>

                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label"
                                        for='mainfeaturetitlear1'>@lang('messages.general.featureTitleen')</label>
                                    <div class="col-sm-4">
                                        <textarea id='mainfeaturetitlear1' style="height: auto" type="text"
                                            class="form-control"
                                            wire:model.debounce.500ms='features.Main_Feature_Title1_Ar'> </textarea>
                                        @error('features.Main_Feature_Title1_Ar') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 col-form-label"
                                        for='mainfeaturetitleen1'>@lang('messages.general.featureTitle')</label>
                                    <div class="col-sm-4">
                                        <textarea id='mainfeaturetitleen1' style="height: auto" type="text"
                                            class="form-control"
                                            wire:model.debounce.500ms='features.Main_Feature_Title1_En'> </textarea>
                                        @error('features.Main_Feature_Title1_En') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label"
                                        for='mainfeaturetitlear2'>@lang('messages.general.featureTitleen')</label>
                                    <div class="col-sm-4">
                                        <textarea id='mainfeaturetitlear2' style="height: auto" type="text"
                                            class="form-control"
                                            wire:model.debounce.500ms='features.Main_Feature_Title2_Ar'> </textarea>
                                        @error('features.Main_Feature_Title2_Ar') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 col-form-label"
                                        for='mainfeaturetitleen2'>@lang('messages.general.featureTitle')</label>
                                    <div class="col-sm-4">
                                        <textarea id='mainfeaturetitleen2' style="height: auto" type="text"
                                            class="form-control"
                                            wire:model.debounce.500ms='features.Main_Feature_Title2_En'> </textarea>
                                        @error('features.Main_Feature_Title2_En') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <hr />

                                @for ($i = 1; $i < 4; $i++)
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label"
                                            for='featuretitleen{{ $i }}'>@lang('messages.general.featureTitleen')</label>
                                        <div class="col-sm-4">
                                            <textarea id='featuretitleen{{ $i }}' style="height: auto"
                                                type="text" class="form-control"
                                                wire:model.debounce.500ms='features.Feature_Title{{ $i }}_En'> </textarea>
                                            @error('features.Feature_Title{{ $i }}_En') <span
                                                    class="error">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2 col-form-label"
                                            for='featuredescriptionen{{ $i }}'>@lang('messages.general.featureDescriptionen')</label>
                                        <div class="col-sm-4">
                                            <textarea id='featuredescriptionen{{ $i }}' style="height: auto"
                                                type="text" class="form-control"
                                                wire:model.debounce.500ms='features.Feature_Description{{ $i }}_En'> </textarea>
                                            @error('features.Feature_Description{{ $i }}_En') <span
                                                    class="error">{{ $message }}</span>
                                            @enderror
                                        </div>



                                    </div>


                                    <div class="form-group row">


                                        <label class="col-sm-2 col-form-label"
                                            for='featuretitlear{{ $i }}'>@lang('messages.general.featureTitle')</label>
                                        <div class="col-sm-4">
                                            <textarea id='featuretitlear{{ $i }}' style="height: auto"
                                                type="text" class="form-control"
                                                wire:model.debounce.500ms='features.Feature_Title{{ $i }}_Ar'> </textarea>
                                            @error('features.Feature_Title{{ $i }}_Ar') <span
                                                    class="error">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label class="col-sm-2 col-form-label"
                                            for='featuredescriptionar{{ $i }}'>@lang('messages.general.featureDescription')</label>
                                        <div class="col-sm-4">
                                            <textarea id='featuredescriptionar{{ $i }}' style="height: auto"
                                                type="text" class="form-control"
                                                wire:model.debounce.500ms='features.Feature_Description{{ $i }}_Ar'> </textarea>
                                            @error('features.Feature_Description{{ $i }}_Ar') <span
                                                    class="error">{{ $message }}</span>
                                            @enderror
                                        </div>


                                    </div>

                                @endfor


                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                            @lang('messages.settings.homepage.save')
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>


                        <div class="tab-pane p-3 {{ $this->selectedTab == 'aboutus' ? 'active' : '' }}"
                            id="aboutus" role="tabpanel">

                            <form wire:submit.prevent="updateAboutUs">

                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label"
                                        for='about_us_Ar'>@lang('messages.general.aboutusparaar')</label>
                                    <div class="col-sm-4">
                                        <textarea id='about_us_Ar' style="height: auto" type="text"
                                            class="form-control"
                                            wire:model.debounce.500ms='aboutus.about_us_Ar'> </textarea>
                                        @error('aboutus.about_us_Ar') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 col-form-label"
                                        for='about_us_En'>@lang('messages.general.aboutusparaen')</label>
                                    <div class="col-sm-4">
                                        <textarea id='about_us_En' style="height: auto" type="text"
                                            class="form-control"
                                            wire:model.debounce.500ms='aboutus.about_us_En'> </textarea>
                                        @error('aboutus.about_us_En') <span
                                                class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>






                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                            @lang('messages.settings.homepage.save')
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
