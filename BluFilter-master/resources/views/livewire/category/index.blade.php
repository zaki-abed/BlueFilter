<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="table-responsive b-0 fixed-solution" data-pattern="priority-columns">
                    <table id="tech-companies-1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>@lang('messages.categories.name')</th>
                                <th>@lang('messages.categories.name_ar')</th>
                                <th>@lang('messages.categories.color')</th>
                                <th>@lang('messages.general.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->name_ar }}</td>
                                <td><div class="p-3" style="background-color: {{ $category->color }};"></div></td>
                                <td>
                                    <div class="btn-group">
                                        @include('livewire.partials.delete-button', ['id' => $category->id])
                                        @include('livewire.partials.edit-button', ['id' => $category->id])
                                    </div>
                                </td>
                            </tr>
                            @if ($loop->last)
                                <tr>
                                    <td colspan="3" class="text-center">{{ $categories->links() }}</td>
                                </tr>
                            @endif
                        @empty
                            <tr><td colspan="3" class="text-center">@lang('messages.categories.no_category')</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <!-- User update model -->
    <div class="col-sm-6 col-md-3 m-t-30">
        <div id="editCategoryModel" class="modal fade bs-example-modal-center" tabindex="-1"
             role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0">{{ __('messages.Update').' '.__('Category') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       <livewire:category.edit-modal/>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!-- /.modal -->
</div>
<!-- end row -->
