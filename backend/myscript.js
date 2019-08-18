const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire({
        title: 'Products',
        text: flashData,
        type: 'success'
    });
}

$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Delete Product',
        text: 'Are you sure to delete this product?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});


const flashMsg = $('.flash-msg').data('flashmsg');

if (flashMsg) {
    Swal.fire({
        title: 'Reservation',
        text: flashMsg,
        type: 'success'
    });
}

$('.tombol-baru').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Update Reservation',
        text: 'Are you sure to complete this reservation?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, complete it!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

const flashadmin = $('.flash-admin').data('flashadmin');

if (flashadmin) {
    Swal.fire({
        title: 'Access Denied',
        text: flashadmin,
        type: 'error'
    });
};
