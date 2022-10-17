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
                                    <th>@lang('messages.posts.title')</th>
                                    <th>@lang('messages.general.featured_img')</th>
                                    <th>@lang('messages.general.author')</th>
                                    <th>@lang('messages.posts.published')</th>
                                    <th>@lang('messages.posts.lang')</th>
                                    <th>@lang('messages.general.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($posts as $post)
                                    <tr>
                                        <td class="text-center"><input wire:model="massDestroyAll" type="checkbox" value="{{ $post->id }}" class="massDestroy" name="massDestroy[]"></td>
                                        <td>{{ Str::words($post->title, 5, '...') }}</td>
                                        <td>
                                            <img src="{{ $post->featured_image_thumbnail ?? 'https://via.placeholder.com/170x100.png/0033bb?text=No%20Image' }}" class="img-thumbnail"
                                                 width="100px" height="70" alt="{{ __('messages.Image') }}">
                                        </td>
                                        <td>{{ $post->author->name ?? 'No Name' }}</td>
                                        <td>{{ $post->updated_at }}</td>
                                        <td>{{ $post->lang }}</td>
                                        <td>
                                            <div class="btn-group">
                                                @include('livewire.partials.delete-button', ['id' => $post->id])
                                                @include('livewire.partials.edit-button', ['href' => route('post.edit', ['id' => $post->id])])
                                                @include('livewire.partials.view-button', ['href' => route('post.view', ['id' => $post->id ])])
                                            </div>
                                        </td>
                                    </tr>
                                    @if ($loop->last)
                                        <tr>
                                            <td colspan="5" class="text-center">{{ $posts->links() }}</td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr><td colspan="5" class="text-center">@lang('messages.posts.no_posts')</td></tr>
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