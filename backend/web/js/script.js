function showAlertSuccessConfirm($msg) {
    Swal.fire({
        // position: 'top-center',
        icon: 'success',
        title: $msg,
        showConfirmButton: true,
        // timer: 1500
    })
}

function showAlertErrorConfirm($msg) {
    Swal.fire({
        // position: 'top-center',
        icon: 'error',
        title: $msg,
        showConfirmButton: true,
        // timer: 1500
    })
}