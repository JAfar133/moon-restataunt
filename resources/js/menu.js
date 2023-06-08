// CommonJS
// import Swal from "sweetalert2";
import toastr from "toastr"
document.addEventListener('click', function(event) {
    if (event.target.classList.contains('item-button')) {
        event.preventDefault();

        const itemId = event.target.getAttribute('data-id');
        const url = event.target.getAttribute('data-url');
        const csrfToken = document.querySelector('#csrf-token').value;

        let count = document.getElementById("cart-count");

        const xhr = new XMLHttpRequest();
        xhr.open('POST', url);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-CSRF-Token', csrfToken);

        xhr.onload = function() {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                if(count!==null){
                    console.log(data.count)
                    count.innerHTML = data.count
                }
                toastr.options = {
                    "positionClass": "toast-top-right",
                    "showDuration": "100",
                    "hideDuration": "1000",
                    "timeOut": "1000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "slideDown",
                    "hideMethod": "fadeOut"
                }
                toastr.success('Блюдо успешно добавлено!')
            } else {
                console.log(JSON.parse(xhr.responseText))
                alert('Error: ' + xhr);
            }
        };

        xhr.onerror = function() {
            console.log(xhr)
            alert('Error: ' + xhr);
        };

        xhr.send('item_id=' + encodeURIComponent(itemId));
    }
});


