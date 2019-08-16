const posMessage = $('.pos-data').data('posmessage');

if (posMessage) {
    Swal.fire({
        title: 'Orders',
        text: posMessage,
        type: 'success'
    });
}

