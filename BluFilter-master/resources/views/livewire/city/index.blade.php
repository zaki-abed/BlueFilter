<div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive b-0 fixed-solution" data-pattern="priority-columns">
                        <table id="tech-companies-1" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('messages.cities.city_name_ar')</th>
                                    <th>@lang('messages.cities.city_name_en')</th>
                                    <th>@lang('messages.cities.country_name')</th>
                                    <th>@lang('messages.general.action')</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach($cities as $city)
                                    <tr>
                                        <td>{{ $city->City_Name_Ar }}</td>
                                        <td>{{ $city->City_Name_En}}</td>
                                        <td>{{ $city->countries->country_name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                @include('livewire.partials.delete-button', ['id' => $city->City_ID])
                                                @include('livewire.partials.edit-button', ['href' => route('city.edit',
                                                ['id' => $city->City_ID])])
                                            </div>
                                        </td>
                                    </tr>
                                    @if ($loop->last)
                                        <tr>
                                            <td colspan="5" class="text-center">{{ $cities->links() }}</td>
                                        </tr>
                                    @endif
                                    @endforeach
                                @if(count($cities) == 0)
                                    <tr>
                                        <td colspan="5" class="text-center">@lang('messages.cities.no_cities')</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
