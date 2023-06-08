
$(document).on('click', '.minus-btn, .plus-btn', function () {
    const itemId = $(this).data('id');
    const url = $(this).data('url');
    const action = $(this).data('action');
    const quantityElement = $(this).siblings('.quantity');
    let quantity = parseInt(quantityElement.text());
    const csrfToken = document.querySelector('#csrf-token').value;

    if (action === 'minus' && quantity > 1) {
        quantity--;
    } else if (action === 'plus') {
        quantity++;
    }

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'id': itemId,
            'quantity': quantity,
            '_token': csrfToken
        },
        success: function (data) {
            // Обновляем данные корзины на странице
            $('#cart-count').text(data.count);
            $('#cart-total').text(data.total);

            quantityElement.text(data.quantity);
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText); // Выводим сообщение об ошибке
        }
    });
});
$(document).on('click', '.delete-btn', function () {
    const itemId = $(this).data('id');
    const url = $(this).data('url');
    const csrfToken = document.querySelector('#csrf-token').value;

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'id': itemId,
            '_token': csrfToken
        },
        success: function (data) {
            // Обновляем данные корзины на странице
            $('#cart-count').text(data.count);
            $('#cart-total').text(data.total);
            // Удаляем удаленный элемент из списка на странице
            const cart_item = '#cart-item-' + itemId;
            $(cart_item).fadeOut(300, function() {
                $(this).remove();
            });
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText); // Выводим сообщение об ошибке
        }
    });
});
