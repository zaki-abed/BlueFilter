@extends('layouts.app')

@section('title', __('messages.AddNewCategory'))


@section('content')
    <livewire:category.create></livewire:category.create>

@endsection

@section('additional_scripts')
    <script src="{{ asset('back/plugins/tinymce/tinymce.min.js') }}"></script>
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
    </script>
@endsection

