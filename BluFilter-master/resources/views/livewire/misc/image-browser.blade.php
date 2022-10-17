<div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="@lang('messages.general.choose_file')" id="selected_image_name" disabled>
    <div class="input-group-append">
        <button class="btn btn-success" type="button" wire:click="$emitSelf('loadImageBrowser')">@lang('messages.media.browse')</button>
    </div>
</div>