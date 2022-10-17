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
        <link href="{{ asset('back/plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css') }}" rel="stylesheet" type="text/css" media="screen">
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
        <link href="{{ asset('back/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('back/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        @yield('stylesheets')
        <livewire:styles />
        <livewire:scripts />
    </head>
    <body>
    <div class="header-bg">
                <header id="topnav">
                    <livewire:partials.topbar />
                    <livewire:partials.menu />
                </header>
            </div>
        <!-- Begin page -->
        <div id="wrapper">

            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        @if(Route::current()->getName() !== 'page.view')
                            <livewire:partials.breadcrumb :title="$title"/>
                        @endif
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            © {{ date('Y') }} {{ __('messages.general.Framework') }} {{ __(config('app.name')) }} <span
            class="d-none d-sm-inline-block"> {{ __('messages.general.Footer') }}</span>.
        </footer>

        <!-- jQuery  -->
        <script src=" {{ asset('back/js/jquery.min.js') }}"></script>
        <script src=" {{ asset('back/js/metismenu.min.js') }}"></script>
        <script src=" {{ asset('back/js/bootstrap.bundle.min.js') }}"></script>
        <script src=" {{ asset('back/js/jquery.slimscroll.js') }}"></script>
        <script src=" {{ asset('back/js/waves.min.js') }}"></script>
        <!-- Morris Chart -->
{{--        <script src="{{ asset('back/plugins/morris/morris.min.js') }}"></script>--}}
{{--        <script src="{{ asset('back/plugins/raphael/raphael.min.js') }}"></script>--}}

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
{{--        <script src="{{ asset('back/pages/datatables.init.js') }}"></script>--}}
        <!-- App js -->
        <script src="{{ asset('back/js/app.js') }}"></script>
        <script src="{{ asset('back/plugins/parsleyjs/parsley.min.js') }}"></script>
        <!-- Dropzone js -->
        <script src="{{ asset('back/plugins/dropzone/dist/dropzone.js') }}"></script>

        <!-- Responsive-table-->
        <script src="{{ asset('back/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js') }}"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function (){
                $('.js-example-basic-multiple').select2();

                $('.send-reply').click(function (){
                    $("#loader").show();
                });

                $('.deleteItem').on('click', function (){
                    confirmAction().then((result) => {
                        if(result?.value) {
                            Livewire.emit('deleteItem', $(this).data('id'));
                        }
                    });
                });

                $('#massDestroyButton').on('click', function (){
                    confirmAction().then((result) => {
                        if(result?.value) {
                            Livewire.emit('massDestroy');
                        }
                    });
                });

                window.addEventListener('categoryUpdated', event => {
                    $('#editCategoryModel').modal('hide');
                    successAlert(event.detail.message);
                });

                window.addEventListener('itemUpdated', event => okWithRedirect(event.detail.message, event.detail.redirect));

                window.addEventListener('itemCreated', event => okWithRedirect(event.detail.message, event.detail.redirect));

                window.addEventListener('itemDeleted', event => okWithRedirect(event.detail.message, event.detail.redirect));

                window.addEventListener('editItem', event => $(event.detail.modal).modal('show'));

                window.addEventListener('showBrowser', event => $('#imageBrowserModel').modal('show'));

                $("#imageBrowserModel").on('show.bs.modal', function(){
                    $("#browserIframe")
                    .html('<iframe frameBorder="0" src="{{ route('media.browse') }}" style="width:100%;height:500px;"></iframe>');
                });


                $("#selectBrowserImage").on('click', function (){
                    const selectedImage = sessionStorage.getItem('selectedImage');

                    if(selectedImage){
                        sessionStorage.removeItem('selectedImage');
                        Livewire.emit('imageSelected', selectedImage);
                        $("#selected_image_name").val(selectedImage);
                        $('#imageBrowserModel').modal('hide');
                    }
                    else{
                        alert('Please select image.');
                    }
                });

                // $("#massDestroyCheckAll").on('click', function (){
                //     if ($(this).prop('checked') == true) {
                //         $('.massDestroy').prop('checked', true)
                //         $('.massDestroy').attr('checked', true)
                //         $('#massDestroyButton').attr('disabled', false)
                //     } else {
                //         $('.massDestroy').prop('checked', false)
                //         $('.massDestroy').attr('checked', false)
                //         $('#massDestroyButton').attr('disabled', true)
                //     }
                // });

                $(".massDestroy").on('change', function (){
                    if ($(".massDestroy:checked").length > 0) {
                        $('#massDestroyButton').attr('disabled', false)
                    } else {
                        $('#massDestroyButton').attr('disabled', true)
                    }
                });

            });
        </script>
        @yield('additional_scripts')
        @stack('page_scripts')
        @yield('editor_scripts')
    </body>
</html>
