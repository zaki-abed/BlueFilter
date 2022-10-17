function successAlert(message){
    swal(
        {
            title: 'Good job!',
            text: message,
            type: 'success',
            showCancelButton: false,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger ml-2'
        }
    )

}

function errorAlert(message){
    swal(
        "Cancelled",
        message,
        "error"
    );
}

function showLoading(message) {
    swal({
        title: message,
        allowEscapeKey: false,
        allowOutsideClick: false,
        onBeforeOpen: () => {
            Swal.showLoading()
        },
    });
}
