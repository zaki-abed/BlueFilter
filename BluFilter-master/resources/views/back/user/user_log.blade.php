@extends('layouts.app')

@section('title', __('messages.Logs'))

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <address>
                        <b>{{ __('messages.FullName') }}:</b>Burhan Tahir<br>
                        <b>{{ __('messages.Email') }}:</b>burhantahir141@gmail.com<br>
                        <b>{{ __('messages.Role') }}:</b>User<br>
                    </address>
                </div>
                <div class="col-6 text-right">
                    <img src="" class="img-thumbnail" id="userImage" width="200px" height="100px">
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="p-2">
                    <h3 class="panel-title font-20"><strong>{{ __('messages.User').' '. __('messages.Login').' '.__('messages.Logs') }}:</strong></h3>
                </div>
                <div class="">
                    <div class="table-responsive">
                        <table id="Logsdatatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>{{ __('messages.Login').' '.__('messages.Time') }}</th>
                                <th>{{ __('messages.Login').' '.__('messages.Ip') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd"><td class="sorting_1" tabindex="0">2021-04-12 06:31:09</td><td>110.93.226.63</td></tr>
                                <tr role="row" class="odd"><td class="sorting_1" tabindex="0">2021-04-12 06:31:09</td><td>110.93.226.63</td></tr>
                                <tr role="row" class="odd"><td class="sorting_1" tabindex="0">2021-04-12 06:31:09</td><td>110.93.226.63</td></tr>
                                <tr role="row" class="odd"><td class="sorting_1" tabindex="0">2021-04-12 06:31:09</td><td>110.93.226.63</td></tr>
                                <tr role="row" class="odd"><td class="sorting_1" tabindex="0">2021-04-12 06:31:09</td><td>110.93.226.63</td></tr>
                                <tr role="row" class="odd"><td class="sorting_1" tabindex="0">2021-04-12 06:31:09</td><td>110.93.226.63</td></tr>
                                <tr role="row" class="odd"><td class="sorting_1" tabindex="0">2021-04-12 06:31:09</td><td>110.93.226.63</td></tr>
                                <tr role="row" class="odd"><td class="sorting_1" tabindex="0">2021-04-12 06:31:09</td><td>110.93.226.63</td></tr>
                                <tr role="row" class="odd"><td class="sorting_1" tabindex="0">2021-04-12 06:31:09</td><td>110.93.226.63</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end row -->


@endsection

@section('additional_scripts')
    <script>
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];
        var url = $(location).attr('href');
        var parts = url.split("/");
        var id = parts[parts.length-1];
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('#Logsdatatable').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[ '0', "desc" ]],
            'ajax': {
                'url': baseUrl + 'admin/user_logs/'+id,
                'type': 'POST'
                // 'data': {
                // }
            },
            "columns": [
                {
                    data: 'login_at',
                    name: 'login_at'
                },
                {
                    data: 'login_ip',
                    name: 'login_ip'
                },
            ]
        });

    </script>

@endsection
