<div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive b-0 fixed-solution" data-pattern="priority-columns">
                        <table id="tech-companies-1" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('messages.countries.country_name_ar')</th>
                                    <th>@lang('messages.countries.country_name_en')</th>
                                    <th>@lang('messages.general.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($countries as $country)
                                    <tr>
                                        <td>{{ $country->Country_Name_Ar }}</td>
                                        <td>{{ $country->Country_Name_En }}</td>
                                        <td>
                                            <div class="btn-group">
                                                @include('livewire.partials.delete-button', ['id' => $country->Country_ID])
                                                @include('livewire.partials.edit-button', ['href' => route('country.edit',
                                                ['id' => $country->Country_ID])])
                                            </div>
                                        </td>
                                    </tr>
                                    @if ($loop->last)
                                        <tr>
                                            <td colspan="5" class="text-center">{{ $countries->links() }}</td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">@lang('messages.countries.no_countries')</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
