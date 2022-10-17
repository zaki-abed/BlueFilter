function successAlert(message){
    swal(
        {
            title: 'Good job!',
            text: message,
            type: 'success',
            showCancelButton: false,
            confirmButtonClass: 'btn btn-success',
        }
    );
}

function okWithRedirect(message, redirectURL) {
    swal(
        {
            title: 'Good job!',
            text: message,
            type: 'success',
            showCancelButton: false,
            confirmButtonClass: 'btn btn-success',
        }
    ).then(result => {
        window.location = redirectURL;
    });
}

function confirmAction() {
    return swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    });
}

function errorAlert(message){
    swal(
        "Cancelled",
        message,
        "error"
    );
}
