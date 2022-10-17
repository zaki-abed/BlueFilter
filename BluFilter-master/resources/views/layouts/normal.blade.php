<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? '' }} | {{ __('Admin Panel') }}</title>
    <meta content="AccessLine Admin Panel Template" name="description" />
    <meta content="Element Media" name="author" />
    <link rel="shortcut icon" href="{{ asset('back/images/favicon.ico') }}">
    <!-- Table css -->
    <link href="{{ asset('back/plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css') }}" rel="stylesheet"
        type="text/css" media="screen">
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('back/plugins/morris/morris.css') }}">
    <!-- sweet alert -->
    <link href="{{ asset('back/plugins/sweet-alert2/sweetalert2.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('back/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('back/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('back/css/icons.css') }}" rel="stylesheet" type="text/css">
    @if(config('site_locale') == 'ar')
    <link href="{{ asset('back/css/style_rtl.css') }}" rel="stylesheet" type="text/css">
    @else
    <link href="{{ asset('back/css/style.css') }}" rel="stylesheet" type="text/css">
    @endif
    <!-- DataTables -->
    <link href="{{ asset('back/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('back/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Dropzone css -->
    {{--        <link href="{{ asset('back/plugins/dropzone/dist/dropzone.css') }}" rel="stylesheet"
    type="text/css">--}}
    @yield('stylesheets')

    <livewire:styles />
    <livewire:scripts />
</head>

<body>
    <header id="topnav" style="display:block;">
        <livewire:partials.topbar />
        <livewire:partials.menu />
    </header>
    <!-- Begin page -->
    <div id="wrapper">
        <div class="container-fluid">
            @if(Route::current()->getName() !== 'page.view')
            <livewire:partials.breadcrumb :title="$title" />
            @endif
            @yield('content')
        </div>
    </div>
    <footer class="footer" hidden>
        © {{ date('Y') }} {{ __('messages.general.Framework') }} {{ __(config('app.name')) }} <span
            class="d-none d-sm-inline-block"> {{ __('messages.general.Footer') }}</span>.
    </footer>
        <footer class="footer">
        © {{ date('Y') }}  {{ __(config('app.name')) }} <span
            class="d-none d-sm-inline-block"> {{ __('messages.general.Footer') }}</span>.
    </footer>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src=" {{ asset('back/js/jquery.min.js') }}"></script>
    <script src=" {{ asset('back/js/metismenu.min.js') }}"></script>
    <script src=" {{ asset('back/js/bootstrap.bundle.min.js') }}"></script>
    <script src=" {{ asset('back/js/jquery.slimscroll.js') }}"></script>
    <script src=" {{ asset('back/js/waves.min.js') }}"></script>
    <!-- Sweet-Alert  -->
    <script src="{{ asset('back/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('back/pages/sweet-alert.init.js') }}"></script>
    <script src="{{ asset('back/custom/js/sweetAlert.js') }}"></script>
    <!-- Required datatable js -->
    <script src="{{ asset('back/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('back/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('back/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('back/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('back/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('back/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('back/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('back/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('back/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('back/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('back/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('back/pages/datatables.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('back/js/app.js') }}"></script>
    <script src="{{ asset('back/plugins/parsleyjs/parsley.min.js') }}"></script>
    <!-- Dropzone js -->
    <script src="{{ asset('back/plugins/dropzone/dist/dropzone.js') }}"></script>

    <!-- Responsive-table-->
    <script src="{{ asset('back/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js') }}"></script>
    <script>
    $(document).ready(function() {
      $('.js-example-basic-multiple').select2();


        $('.send-reply').click(function() {
            $("#loader").show();
        });

        $('.deleteItem').on('click', function() {
            confirmAction().then((result) => {
                if (result?.value) {
                    Livewire.emit('deleteItem', $(this).data('id'));
                }
            });
        });

        window.addEventListener('imageSelected', event => {
            let fileName = ($(event.detail.id).val().split("\\").pop()).substr(0, 30) + '...';
            $(event.detail.id).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        window.addEventListener('user_approved', event => {
            successAlert(event.detail.message);
        });

        window.addEventListener('user_rejected', event => {
            successAlert(event.detail.message);
        });

        window.addEventListener('categoryUpdated', event => {
            $('#editCategoryModel').modal('hide');
            successAlert(event.detail.message);
        });

        window.addEventListener('itemUpdated', event => okWithRedirect(event.detail.message, event.detail
            .redirect));

        window.addEventListener('itemCreated', event => okWithRedirect(event.detail.message, event.detail
            .redirect));

        window.addEventListener('itemDeleted', event => okWithRedirect(event.detail.message, event.detail
            .redirect));

        window.addEventListener('editItem', event => $(event.detail.modal).modal('show'));
    });
    </script>
    @yield('additional_scripts')
    @stack('page_scripts')
    @yield('editor_scripts')
</body>

</html>
