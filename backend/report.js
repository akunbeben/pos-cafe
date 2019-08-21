const flashdata = $('.flash-report').data('flashreport');

if (flashdata) {
    Swal.fire({
        title: 'Warning!',
        text: flashdata,
        type: 'warning'
    });
}

