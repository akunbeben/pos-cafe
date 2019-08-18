const flashemployee = $('.flash-employee').data('flashemployee');

if (flashemployee) {
    Swal.fire({
        title: 'Employees',
        text: flashemployee,
        type: 'warning'
    });
}

$('.tombol-employee').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Delete Employee',
        text: 'Are you sure to delete this Employee from database?',
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