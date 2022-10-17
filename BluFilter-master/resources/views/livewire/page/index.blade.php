<div class="col-12">
    <div class="card m-b-30">
        <div class="card-body">
            <div class="table-responsive b-0 fixed-solution">
                <table id="tech-companies-1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>@lang('messages.pages.title')</th>
                            <th>@lang('messages.pages.brief')</th>
                            <th>@lang('messages.general.author')</th>
                            <th>@lang('messages.pages.lang')</th>
                            <th>@lang('messages.general.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pages as $page)
                            <tr>
                                <td class="text-center"><input wire:model="massDestroyAll" type="checkbox" value="{{ $page->id }}" class="massDestroy" name="massDestroy[]"></td>
                                <td>{{ Str::words($page->title, 5, '...') }}</td>
                                <td>{{ Str::words($page->brief, 5, '...') }}</td>
                                <td>{{ $page->author->name ?? 'No Author' }}</td>
                                <td>{{ $page->lang }}</td>
                                <td>
                                    <div class="btn-group">
                                        @include('livewire.partials.delete-button', ['id' => $page->id])
                                        @include('livewire.partials.edit-button', ['href' => route('page.edit', ['id' => $page->id])])
                                        @include('livewire.partials.view-button', ['href' => route('page.view', ['id' => $page->id ])])
                                    </div>
                                </td>
                            </tr>
                            @if ($loop->last)
                                <tr>
                                    <td colspan="4" class="text-center">{{ $pages->links() }}</td>
                                </tr>
                            @endif
                        @empty
                            <tr><td colspan="4" class="text-center">@lang('messages.pages.no_pages')</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<div class="d-flex"><button id="massDestroyButton" class="btn btn-danger my-2" disabled>@lang('messages.general.deleteAll')</button></div>
