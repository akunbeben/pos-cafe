$('.clear-cart').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Start new sales',
        text: 'Are you sure to start new sales?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

$(document).ready(function () {
    $('#product').select2({
        placeholder: '-- Select Product --'
    });
});