<div>
    <div class="form-group row">
        <label for="page_content" class="col-sm-2 col-form-label">@lang('messages.general.body')</label>
        <div class="col-sm-10" wire:ignore>
            <textarea class="form-control" id="page_content" cols="30" rows="10" wire:model.debounce.500ms="body"></textarea>
        </div>
    </div>

    @section('editor_scripts')
        <script src="https://cdn.tiny.cloud/1/h61gsj7pxae48hmn42gxit9qw8hg9deemhfl18flr2zejhu4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            $(document).ready(function () {
                Livewire.on('completed', () => {
                    tinymce.get('page_content').setContent('');
                });

                if($("#page_content").length > 0){
                    tinymce.init({
                        selector: "textarea#page_content",
                        directionality : 'rtl',
                        menubar: false,
                        image_title: true,
                        image_advtab: true,
                        paste_data_images: true,
                        automatic_uploads: true,
                        relative_urls : false,
                        remove_script_host : false,
                        convert_urls : true,
                        images_upload_credentials: true,
                        height:300,
                        plugins: [
                            "advlist autolink link image lists charmap hr anchor pagebreak",
                            "wordcount code media nonbreaking",
                            "save table contextmenu directionality template textcolor"
                        ],
                        toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor",
                        style_formats: [
                            {title: 'Bold text', inline: 'b'},
                            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                            {title: 'Example 1', inline: 'span', classes: 'example1'},
                            {title: 'Example 2', inline: 'span', classes: 'example2'},
                            {title: 'Table styles'},
                            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                        ],
                        // file_picker_callback: function(callback, value, meta) {
                        //     imageFilePicker(callback, value, meta);
                        // },
                        setup: function (editor) {
                            editor.on('init change', function () {
                                editor.save();
                            });

                            editor.on('change', function (e) {
                            @this.set('body', editor.getContent());
                            });
                        }
                    });
                }
            });

            // function imageFilePicker(callback, value, meta) {
            //     tinymce.activeEditor.windowManager.open({
            //         title: 'Image Picker',
            //         url: '{{ route('media.browse') }}',
            //         width: 1200,
            //         height: 500,
            //         buttons: [
            //             {
            //                 text: 'Insert',
            //                 onclick: function () {
            //                     const selectedImage = sessionStorage.getItem('selectedImage');

            //                     if(selectedImage){
            //                         if (meta.filetype === 'image') {
            //                             sessionStorage.removeItem('selectedImage');
            //                             callback(selectedImage, {alt: 'My alt text'});
            //                         }
            //                         tinymce.activeEditor.windowManager.close();
            //                     }
            //                     else{
            //                         alert('Please select image.');
            //                     }
            //                 }
            //             },
            //             {
            //                 text: 'Close',
            //                 onclick: 'close'
            //             }
            //         ],
            //     },
            //     {
            //         oninsert: url => callback(url),
            //     });
            // }
        </script>
    @endsection
</div>
