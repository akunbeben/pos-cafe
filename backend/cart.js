const cartMessage = $('.cart-data').data('cartmessage');

if (cartMessage) {
    Swal.fire({
        title: 'Pending Order',
        text: cartMessage,
        type: 'warning'
    });
}

$('.tombol-cart').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Delete Product',
        text: 'Are you sure to delete this product from cart?',
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