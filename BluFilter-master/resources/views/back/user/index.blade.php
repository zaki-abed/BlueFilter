@extends('layouts.app')

@section('title', __('messages.Users'))

@section('content')
    <livewire:user.index></livewire:user.index>
@endsection

@section('additional_scripts')
            <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <!-- <script src="{{ asset('custom/js/user.js') }}"></script> -->
            <script>
                $(document).ready(function(){
                    var getUrl = window.location;
                    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var table = $('#userDatatable').DataTable({
                        "processing": true,
                        "serverSide": true,
                        "order": [[ '0', "desc" ]],
                        'ajax': {
                            'url': baseUrl + 'admin/show_user',
                            'type': 'POST'
                            // 'data': {
                            // }
                        },
                        "columns": [
                            {
                                data: 'User_First_Name',
                                name: 'User_First_Name'
                            },
                            {
                                data: 'User_Last_Name',
                                name: 'User_Last_Name'
                            },
                            {
                                data: 'Username',
                                name: 'Username'
                            },
                            {
                                data: 'email',
                                name: 'email'
                            },
                            {
                                mRender: function ( data, row, fulldata ){
                                    if(fulldata.User_Role == "user"){
                                        return "<?php echo __('messages.User'); ?>"
                                    }else{
                                        return "<?php echo __('messages.Admin'); ?>"
                                    }
                                }
                            },
                            {
                                mRender: function ( data, row, fulldata ){
                                    if(fulldata.User_Language == "en"){
                                        return "<?php echo __('messages.English'); ?>"
                                    }else{
                                        return "<?php echo __('messages.Arabic'); ?>"
                                    }
                                }
                            },
                            {
                                mRender: function ( data, row, fulldata ){
                                    if(fulldata.User_Status == 1){
                                        return '<span class="badge badge-success status_user" data-id="'+fulldata.id+'" data-status="'+fulldata.User_Status+'" style="width: 100px; height: 20px; font-size: 13px; cursor:pointer"><?php echo __('messages.Active'); ?></span>'
                                    }else{
                                        return '<span class="badge badge-danger status_user" data-id="'+fulldata.id+'" data-status="'+fulldata.User_Status+'" style="width: 100px; height: 20px; font-size: 13px; cursor:pointer"><?php echo __('messages.Deactive'); ?></span>'
                                    }
                                }
                            },
                            {
                                mRender: function ( data, row, fulldata ){
                                    return '<a href="#" data-id="'+fulldata.id+'" class="edit_user"><i class="fas fa-user-edit"></i></a>' +
                                        '<a href="#" data-id="'+fulldata.id+'" class="delete_user" style="margin: 2px 5px 0 5px;"><i class="far fa-trash-alt"></i></a>' +
                                        '<a href="<?php echo url('/admin/user_logs/');?>/'+fulldata.id+'" class="show_login_user" style="margin: 2px 5px 0 5px;"><i class="fa fa-clock" aria-hidden="true"></i></a>'
                                }
                            },
                        ]
                    });

                    var filetype;
                    $(".custom-file-input").on("change", function(e) {
                        var fileName = $(this).val().split("\\").pop();
                        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                        var fileName = e.target.files[0];
                        filetype = fileName.type;
                        if(filetype == 'image/jpeg' || filetype == 'image/jpg' || filetype == 'image/png'){
                            readURL(this);
                        }
                    });

                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('#userImage').show().attr('src', e.target.result);
                            };
                            // console.log(input.files[0]);
                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                    // $('#updateUserForm').parsley();
                    //--------------start edit user-------------------------
                    $('#userDatatable').on('click', '.edit_user', function(){
                        var id = $(this).data('id');
                        $('#editUserModel').modal('show');
                        $('#userImage').attr('src', '')
                        $.ajax({
                            url: baseUrl + "admin/edit_user/"+id,
                            type:"GET",
                            success:function(response){
                                if(response.status == true){
                                    $('#updateFirstname').val(response.data.User_First_Name)
                                    $('#updateLastname').val(response.data.User_Last_Name)
                                    $('#updateUsername').val(response.data.Username)
                                    $('#updateEmail').val(response.data.email)
                                    $('#updateUserrole').val(response.data.User_Role)
                                    $('#updateUserId').val(response.data.id);
                                    $('#updateUserlanguage').val(response.data.User_Language);
                                    if(response.data.profile != null){
                                        $('#userImage').show().attr('src', response.data.profile)
                                    }else{
                                        $('#userImage').hide()
                                    }
                                }else{
                                    $('#errorAlert').show().text(response.message);
                                }
                            },
                            error: function(err) {
                                console.log("error");
                                errorAlert("<?php echo __('messages.ErrorMessages.SomethingWentWrong'); ?>");
                            }
                        });
                    })
                    //----------------end edit user-----------------------

                    //--------------Update user data-------------------
                    $("#updateUserForm").validate({

                        rules: {
                            "updateFirstname": {
                                required: true,
                            },
                            "updateLastname": {
                                required: true,
                            },
                            "updateUsername": {
                                required: true,
                            },
                            "updateEmail": {
                                required: true,
                                email: true
                            },
                            "confirmpassword" : {
                                equalTo : "#pass2"
                            },
                            "updateUserlanguage": {
                                required: {
                                    depends: function(element) {
                                        if('default' == $('#updateUserlanguage').val()){
                                            $('#updateUserlanguage').val('');
                                        }
                                        return true;
                                    }
                                }
                            },
                            "updateUserrole": {
                                required: {
                                    depends: function(element) {
                                        if('default' == $('#updateUserrole').val()){
                                            $('#updateUserrole').val('');
                                        }
                                        return true;
                                    }
                                }
                            },
                        },
                        messages: {
                            "updateFirstname": {
                                required: "<?php echo __('messages.Validation.Firstname'); ?>"
                            },
                            "updateLastname": {
                                required: "<?php echo __('messages.Validation.Lastname'); ?>",
                            },
                            "updateUsername": {
                                required: "<?php echo __('messages.Validation.Username'); ?>",
                            },
                            "updateEmail": {
                                required: "<?php echo __('messages.Validation.Email'); ?>",
                                email: "<?php echo __('messages.Validation.EmailInvalid'); ?>"
                            },
                            "confirmpassword": {
                                equalTo: "<?php echo __('messages.Validation.Same_Password'); ?>"
                            },
                            "updateUserlanguage": {
                                required: "<?php echo __('messages.Validation.Language'); ?>"
                            },
                            "updateUserrole": {
                                required: "<?php echo __('messages.Validation.Role'); ?>"
                            },

                        },
                        submitHandler: function (form) { // for demo
                            // form.preventDefault();
                            if(filetype){
                                if(filetype != 'image/jpeg' && filetype != 'image/jpg' && filetype != 'image/png'){
                                    var msg = "<?php echo __('messages.Validation.Image'); ?>"
                                    errorAlert(msg);
                                    return;
                                }
                            }

                            updateUser();
                            return false;
                        }
                    });

                    function updateUser(){
                        var fd = new FormData();
                        fd.append('id',  $('#updateUserId').val());
                        fd.append('image', $('#customFile')[0].files[0]);
                        fd.append('firstname', $('#updateFirstname').val());
                        fd.append('lastname', $('#updateLastname').val());
                        fd.append('username', $('#updateUsername').val());
                        fd.append('email', $('#updateEmail').val());
                        fd.append('password', $('#updatePass3').val());
                        fd.append('password',$('#updatePass3').val());
                        fd.append('role', $('#updateUserrole').val());
                        fd.append('language', $('#updateUserlanguage').val());
                        $.ajax({
                            url: baseUrl + "admin/update_user",
                            type:"POST",
                            processData: false,
                            contentType: false,
                            data: fd,
                            success:function(response){
                                if(response.status == true){
                                    successAlert(response.message);
                                    $('#editUserModel').modal('hide');
                                    table.ajax.reload(null, false);
                                }else{
                                    $('#errorAlert').show().text(response.message)
                                    setTimeout(function(){
                                        $('#errorAlert').fadeOut();
                                    }, 10000);
                                }
                            },
                            error: function(err) {
                                console.log(err);
                            }
                        });
                    }
                    //---------------end user data----------------------

                    //----------------Delete user-------------------------
                    $('#userDatatable').on('click', '.delete_user', function(){
                        var id = $(this).data('id');
                        swal({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, delete it!',
                            cancelButtonText: 'No, cancel!',
                            confirmButtonClass: 'btn btn-success',
                            cancelButtonClass: 'btn btn-danger ml-2',
                            buttonsStyling: false
                        }).then(result => {
                            if (result.value) {
                                deleteUser(id)
                                // swal("Deleted!", "User has been deleted.", "success")
                                // location.reload();
                                table.ajax.reload(null, false);
                            } else if (result.dismiss === swal.DismissReason.cancel) {
                                swal("Cancelled", "Your imaginary file is safe :)", "error");
                            }
                        });
                    });

                    function deleteUser(id){
                        if(id){
                            $.ajax({
                                url: baseUrl + "admin/delete_user/"+id,
                                type:"GET",
                                success:function(response){
                                    // console.log(response.data);
                                    if(response.status == true){
                                        successAlert(response.message);
                                        return true;
                                    }else{
                                        return false;
                                    }
                                },
                                error: function(err) {
                                    console.log("error");
                                    return false;
                                }
                            });
                        }else{
                            console.log('false')
                            return false;
                        }
                    }
                    //--------------end delete user---------------------


                    //--------------change user status-----------------
                    $('#userDatatable').on('click', '.status_user', function(){
                        var id = $(this).data('id');
                        var status = $(this).data('status');
                        var message = (status == 1) ? 'Yes, De-activate it!' : 'Yes, Activate it!';
                        swal({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonText: message,
                            cancelButtonText: 'No, cancel!',
                            confirmButtonClass: 'btn btn-success',
                            cancelButtonClass: 'btn btn-danger ml-2',
                            buttonsStyling: false
                        }).then(result => {
                            if (result.value) {
                                changeStatus(id)
                                // swal("Success!", "User status successfully change.", "success")
                                table.ajax.reload(null, false);
                            } else if (result.dismiss === swal.DismissReason.cancel) {
                                swal("Cancelled", "Your imaginary file is safe :)", "error");
                            }
                        });
                    });

                    function changeStatus(id){
                        if(id){
                            $.ajax({
                                url: baseUrl + "admin/user_status_change/"+id,
                                type:"GET",
                                success:function(response){
                                    // console.log(response);
                                    // return;
                                    if(response.status == true){
                                        successAlert(response.message);
                                        return true;
                                    }else{
                                        return false;
                                    }
                                },
                                error: function(err) {
                                    console.log("error");
                                    return false;
                                }
                            });
                        }else{
                            console.log('false')
                            return false;
                        }
                    }
                    //------------------end change status-----------------
                });
            </script>


@endsection

