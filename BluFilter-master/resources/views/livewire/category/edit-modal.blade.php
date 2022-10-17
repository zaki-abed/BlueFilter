<form wire:submit.prevent="updateCategory">

    @if($editCategory)
        <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label">@lang('messages.categories.name')</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" id="name" wire:model="name">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        
        <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label">@lang('messages.categories.name_ar')</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" id="name_ar" wire:model="name_ar">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="color" class="col-sm-4 col-form-label">@lang('messages.categories.color')</label>
            <div class="col-sm-8">
                <input class="form-control" type="color"  id="color" wire:model="color">
                @error('color') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group">
            <div>
                <button type="submit" class="btn btn-success waves-effect waves-light">
                    @lang('messages.categories.update_category')
                </button>
                <button type="reset" class="btn btn-secondary waves-effect m-l-5" data-dismiss="modal" aria-label="Close">
                    @lang('messages.general.cancel')
                </button>
            </div>
        </div>
    @endif
</form>
