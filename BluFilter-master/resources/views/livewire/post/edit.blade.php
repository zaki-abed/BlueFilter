<div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <form wire:submit.prevent="update">

                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">@lang('messages.posts.title')</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" wire:model.debounce.500ms="title" id="title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brief" class="col-sm-2 col-form-label">@lang('messages.posts.brief')</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" wire:model.debounce.500ms="brief" id="brief">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">@lang('messages.general.featured_img')</label>

                            <div class="col-sm-4">
                                <livewire:misc.image-browser/>
                            </div>

                            <label class="col-sm-1 col-form-label" for="published">@lang('messages.posts.published')</label>
                            <div class="col-sm-1">
                                <select class="form-control" wire:model.debounce.500ms="published" id="published">
                                    <option value="1" selected>@lang('messages.general.yes')</option>
                                    <option value="0">@lang('messages.general.no')</option>
                                </select>
                                @error('published') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <label class="col-sm-1 col-form-label" for="lang">@lang('messages.posts.lang')</label>
                            <div class="col-sm-2">
                                <select class="form-control" wire:model.debounce.500ms="lang" id="lang">
                                    <option value="ar" selected>@lang('messages.lang.ar')</option>
                                    <option value="en">@lang('messages.lang.en')</option>
                                </select>
                                @error('lang') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="video_link" class="col-sm-2 col-form-label">@lang('messages.posts.video_link')</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" wire:model.debounce.500ms="video_link" id="video_link">
                            </div>
                        </div>

                        <livewire:misc.editor :body="$body"/>

                        <div class="form-group row">
                            <div class="col col-sm-offset-2">
                                @error('body') <span class="error">{{ $message }}</span> @enderror
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
