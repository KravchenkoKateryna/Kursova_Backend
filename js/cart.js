function addToCart(id) {
    fetch('/cart/add/' + id, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            quantity: 1,
        }),
    })
        .then(response => {
            return response.json();
        })
        .then(data => {
            document.getElementById('amount' + id).textContent = data.newAmount;
        })
        .catch(error => console.error('Error:', error));
}

function removeFromCart(id) {
    fetch('/cart/remove/' + id, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            quantity: 1,
        }),
    })
        .then(window.location.reload());
}

function deleteFromCart(id) {
    fetch('/cart/delete/' + id, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            quantity: 1,
        }),
    })
        .then(window.location.reload());
}
