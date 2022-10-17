``<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <form wire:submit.prevent="createCategory">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">@lang('messages.categories.name')</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="search"  id="name" wire:model="name">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        
                        <label for="name" class="col-sm-2 col-form-label">@lang('messages.categories.name_ar')</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="search"  id="name_ar" wire:model="name_ar">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        

                        <label for="color" class="col-sm-2 col-form-label">@lang('messages.categories.color')</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="color" id="color" wire:model="color">
                            @error('color') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4 ">
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                @lang('messages.categories.create')
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->
