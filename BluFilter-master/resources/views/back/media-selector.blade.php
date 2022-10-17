<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta content="ElementCore Admin Panel Template" name="description" />
        <meta content="Element Media" name="author" />
        <link rel="shortcut icon" href="{{ asset('back/images/favicon.ico') }}">

        <link href="{{ asset('back/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('back/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('back/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('back/css/style.css') }}" rel="stylesheet" type="text/css">

        <style>
            body {
                margin: 0;
                padding: 0;
            }

            img {
                border: 0 none;
                display: inline-block;
                vertical-align: middle;
            }
            .radio-img  > input {
                display:none;
            }

            .radio-img  > img{
                cursor:pointer;
                border:2px solid transparent;
            }
            .pagination  a {
                cursor: pointer;
            }
            .radio-img  > input:checked + img{
                border:3px solid orange !important;
            }
            .imgSelect label.radio-img img.img-responsive {
                border: none;
                width: 100% !important;
            }
            .imgSelect {
                display: flex;
                margin: 0 -5px !important;
                flex-wrap: wrap;
            }

            .imgSelect label.radio-img {
                width: 11.11%;
                flex: 0 0 11.11%;
                margin: 0 !important;
                padding: 5px;
            }

            .imgSelect label.radio-img img.img-responsive {
                /* width: 100%;
                height: 100%; */
                left: 0;
                width: 132px;
                height: 132px;
            }

            .pageBgcolor {
                background: antiquewhite;
            }
            .wrapper {
                padding-top: 10px;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#upload" role="tab">
                                    <span class="d-block d-md-block">@lang('messages.media.upload_media')</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#gallery" role="tab">
                                    <span class="d-block d-md-block">@lang('messages.media.library')</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane p-3" id="upload" role="tabpanel">
                                <form class="" action="#" method="POST" id="uploadImageForm" enctype= "multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">@lang('messages.media.upload_media')</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="image" accept="image/*">
                                                <label class="custom-file-label" for="customFile">@lang('messages.general.choose_file')</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="image"></label>
                                        <div class="col-sm-10">
                                            <img src="" alt="@lang('messages.general.image')" class="img-thumbnail" id="uploadImage"
                                                 width="200px" height="100px" style="display:none">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light" id="btnAddImage">
                                                @lang('messages.media.upload')
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect m-l-5" id="btnReset">
                                                @lang('messages.general.cancel')
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane py-3 gallery active" id="gallery" role="tabpanel">
                                <div class="col-12 col-sm-12 col-md-12 p-0">
                                    <div class="imgSelect">
                                        @foreach($images as $image)
                                            <label class="radio-img mr-1">
                                                <input type="radio" name="image" value="{{ $image->raw_file_name }}"/>
                                                <img class="img-responsive" src="{{ $image->filename  }}"
                                                     height="200px" width="200px">
                                            </label>
                                        @endforeach
                                    </div>
                                    <div class="col-12 text-center d-flex justify-content-center mt-2">
                                        {{ $images->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('back/js/jquery.min.js') }}"></script>
        <script src="{{ asset('back/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('back/js/metismenu.min.js') }}"></script>
        <script src="{{ asset('back/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('back/js/waves.min.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('back/js/app.js') }}"></script>
        <script>
            $(document).ready(function(){
                sessionStorage.removeItem('selectedImage');

                $(".custom-file-input").change(showThumbnail);
                $('#btnAddImage').click(uploadImage);

                $('input[type=radio][name=image]').change(function() {
                    sessionStorage.setItem('selectedImage', $(this).val());
                });

            });

            function showThumbnail(e) {
                let fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                fileName = e.target.files[0];

                filetype = fileName.type;
                if(filetype === 'image/jpeg' || filetype === 'image/jpg' || filetype === 'image/png'){
                    readURL(this, fileName);
                }
            }

            function readURL(input, fileName) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#uploadImage').show().attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function uploadImage(e) {
                e.preventDefault();
                let fd = new FormData();
                let image = $('#customFile')[0].files[0];

                const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];

                if(filetype && allowedTypes.includes(filetype)){
                    fd.append('image', image);
                    fd.append('_token', '{{ csrf_token() }}');

                    $.ajax({
                        url: '{{ route('media.upload') }}',
                        type:"POST",
                        processData: false,
                        contentType: false,
                        data: fd,
                        beforeSend: function() {
                            $('#btnAddImage').prop('disabled', true).text('{{ __('messages.media.uploading') }} ')
                            .prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                        },
                        success:function(response){
                            $('#btnAddImage').html('{{ __('messages.media.upload_complete') }}');

                            setTimeout(() => location.reload(), 500);
                        },
                        error: function(err) {
                            errorAlert('{{ __('messages.general.went_wrong') }}');
                        }
                    });
                }
                else{
                    errorAlert("{{ __('messages.general.only_image') }}");
                }
            }
        </script>
    </body>
</html>
