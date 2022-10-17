<div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive b-0 fixed-solution" data-pattern="priority-columns">
                        <table id="tech-companies-1" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>@lang('messages.ads.title')</th>
                                    <th>@lang('messages.general.featured_img')</th>
                                    <th>@lang('messages.ads.published')</th>
                                    <th>@lang('messages.ads.lang')</th>
                                    <th>@lang('messages.general.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ads as $ad)
                                    <tr>
                                        <td class="text-center"><input wire:model="massDestroyAll" type="checkbox" value="{{ $ad->id }}" class="massDestroy" name="massDestroy[]"></td>
                                        <td>{{ Str::words($ad->title, 5, '...') }}</td>
                                        <td>
                                            <img src="{{ $ad->featured_image_thumbnail ?? 'https://via.placeholder.com/170x100.png/0033bb?text=No%20Image' }}" class="img-thumbnail"
                                                 width="100px" height="70" alt="{{ __('messages.Image') }}">
                                                
                                        </td>
                                        <td>{{ $ad->updated_at }}</td>
                                        <td>{{ $ad->lang }}</td>
                                        <td>
                                            <div class="btn-group">
                                                @include('livewire.partials.delete-button', ['id' => $ad->id])
                                                @include('livewire.partials.edit-button', ['href' => route('ads.edit', ['id' => $ad->id])])
                                                @include('livewire.partials.view-button', ['href' => route('ads.view', ['id' => $ad->id ])])
                                            </div>
                                        </td>
                                    </tr>
                                    @if ($loop->last)
                                        <tr>
                                            <td colspan="5" class="text-center">{{ $ads->links() }}</td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr><td colspan="5" class="text-center">@lang('messages.ads.no_ads')</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex"><button id="massDestroyButton" class="btn btn-danger my-2" disabled>@lang('messages.general.deleteAll')</button></div>