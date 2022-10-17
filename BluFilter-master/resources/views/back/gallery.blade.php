@extends('layouts.normal')

@section('stylesheets')
    <!-- Magnific popup -->
    <link href="{{ asset('back/plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css">
    <style>

        img {
            border: 0 none;
            display: inline-block;
            /* height: auto; */
            /* max-width: 100%; */
            vertical-align: middle;
        }
        .nopad {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        /*image gallery*/
        .image-checkbox {
            cursor: pointer;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            border: 0;
            margin-bottom: 0;
            outline: 0;
        }
        /* new */
        label.image-checkbox.checkbox-active i.fa.fa-check.hidden {
            display: inline-block !important;
            color: #30419b;
        }

        label.image-checkbox.checkbox-active.image-checkbox-checked i.fa.fa-check.hidden {
            color: #fff !important;
        }
        /* end new */
        .image-checkbox input[type="checkbox"] {
            display: none;
        }

        .image-checkbox-checked {
            border-color: #4783B0;
        }
        i.fa.fa-check.hidden {
            display: none !important;
        }

        label.image-checkbox {
            position: relative;
        }

        label.image-checkbox.image-checkbox-checked i.fa.fa-check {
            display: inline-block !important;
        }
        .image-checkbox .fa {
            position: absolute;
            color: #ffffff;
            background-color: #30419b;
            padding: 10px;
            top: 0;
            right: 5px;
        }
        .image-checkbox-checked .fa {
            display: block !important;
        }

        .image-checkbox.popup-gallery a {
            pointer-events: all !important;
        }

        .image-checkbox a {
            pointer-events: none;
        }

        .pageBackgrounf{
            background: lightblue
        }
    </style>
@endsection


@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#upload" role="tab">
                            <span class="d-block d-md-block">@lang('messages.media.upload_media')</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#media" role="tab">
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
                    <div class="tab-pane active p-3" id="media" role="tabpanel">
                        <div class="row">
                            @if(session('success'))
                                <div class="col-12">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        {{ session('success') }}
                                    </div>
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="col-12">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        {{ session('error') }}
                                    </div>
                                </div>
                            @endif
                            @error('ids')
                            <div class="col-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                            <div class="col-12 text-right">
                                <form action="{{ route('media.delete') }}" class="d-none" method="post" id="deleteImagesForm">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="ids[]" id="selectedImages">
                                </form>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary  waves-effect waves-light selection-start">
                                        @lang('messages.media.delete')
                                    </button>

                                    <button type="submit" class="btn btn-danger waves-effect waves-light btnDeleteImage" style="display:none">
                                        @lang('messages.general.delete')
                                    </button>

                                    <button type="button" class="btn btn-success waves-effect waves-light btnCancel" style="display:none">
                                        @lang('messages.general.cancel')
                                    </button>
                                </div>
                            </div>

                            <div class="col-12 mt-3 AppendImages">
                                @forelse($images as $image)
                                    <label data-id="{{ $image->id }}" class="image-checkbox popup-gallery">
                                        <a class="float-left" href="{{ $image->filename }}" title="Image">
                                            <div class="img-fluid d-block mx-auto">
                                                <img class="img-responsive click-image" src="{{ $image->filename }}"
                                                     style="margin:0px 5px 5px 0px" height="150px" width="150px">
                                            </div>
                                        </a>
                                        <input type="checkbox"/>
                                        <i class="fa fa-check hidden"></i>
                                    </label>
                                @empty
                                    <div class="alert alert-warning" role="alert">
                                        @lang('messages.media.no_media')
                                    </div>
                                @endforelse

                                {{ $images->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>/
</div>
@endsection

@section('additional_scripts')
    <script src="{{ asset('back/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('back/pages/lightbox.js') }}"></script>
    <script>
        let selectedImages = [];
        let filetype;

        $(document).ready(function (){
            $(".custom-file-input").change(showThumbnail);

            $('#btnAddImage').click(uploadImage);

            $('.selection-start').on('click', function(){
                $(this).hide()
                $('.btnDeleteImage').show();
                $('.btnCancel').show();
                $('.image-checkbox').removeClass('popup-gallery').toggleClass('checkbox-active');

                clickImage();
            });

            $('.btnCancel').on('click', function(){
                $(this).hide()
                $('.btnDeleteImage').hide();
                $('.selection-start').show();
                location.reload();
            });

            $('.btnDeleteImage').on('click', deleteImages);
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

                swal({
                    title: '{{ __('messages.general.wait') }}',
                    text: "{{ __('messages.media.uploading') }}",
                    onOpen: () => {
                        swal.showLoading();

                        $.ajax({
                            url: '{{ route('media.upload') }}',
                            type:"POST",
                            processData: false,
                            contentType: false,
                            data: fd,
                            success:function(response){
                                okWithRedirect(response.message, response.redirect);
                            },
                            error: function(err) {
                                errorAlert('{{ __('messages.general.went_wrong') }}');
                            }
                        });
                    }
                });
            }
            else{
                errorAlert("{{ __('messages.general.only_image') }}");
            }
        }

        function deleteImages() {
            confirmAction().then((result) => {
                if(result?.value) {
                    document.getElementById('selectedImages').value = selectedImages;
                    document.getElementById('deleteImagesForm').submit();
                }
            });
        }

        function clickImage(){
            $(".image-checkbox").on("click", function (e) {
                e.preventDefault();

                $(this).toggleClass('image-checkbox-checked');

                let $checkbox = $(this).find('input[type="checkbox"]');
                $checkbox.prop("checked",!$checkbox.prop("checked"))

                if($(this).hasClass('image-checkbox-checked')){
                    selectedImages.push($(this).data('id'));
                }
                else{
                    let removeItem = $(this).data('id');
                    selectedImages = selectedImages.filter(id => id !== removeItem);
                }
            });
        }
    </script>
@endsection
