@extends('layouts.app')


@section('content-page')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">{{ __('Add New Page') }}</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __(config('app.name')) }}</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Pages') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('Add New Page') }}</li>
                            </ol>
                        </div>
                    </div> <!-- end row -->
                </div>
                <!-- end page-title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">{{ __('Page Title:') }}</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-sm-2 col-form-label">{{ __('Short Brief:') }}</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="search" value="How do I shoot web" id="example-search-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">{{ __('Featured Image') }}:</label>
                                        <div class="col-sm-6">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="image" accept="image/*">
                                                <label class="custom-file-label" for="customFile">{{ __('messages.ChooseFile') }}</label>
                                            </div>
                                        </div>

                                        <label class="col-sm-2 col-form-label">{{ __('Published') }}:</label>
                                        <div class="col-sm-2">
                                            <select class="form-control">
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">{{ __('Body:') }}</label>
                                    <div class="col-sm-10">
                                        <textarea name="body" id="page_content" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- content -->

    @include('back.partials.footer_credit')

    @section('additional_scripts')
            {{-- <script src="{{ asset('back/plugins/tinymce/tinymce.min.js') }}"></script>
            <script>
                $(document).ready(function () {
                    if($("#page_content").length > 0){
                        tinymce.init({
                            selector: "textarea#page_content",
                            theme: "modern",
                            height:300,
                            plugins: [
                                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                                "save table contextmenu directionality emoticons template paste textcolor"
                            ],
                            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                            style_formats: [
                                {title: 'Bold text', inline: 'b'},
                                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                                {title: 'Example 1', inline: 'span', classes: 'example1'},
                                {title: 'Example 2', inline: 'span', classes: 'example2'},
                                {title: 'Table styles'},
                                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                            ]
                        });
                    }
                });
            </script> --}}
    @endsection
@endsection
