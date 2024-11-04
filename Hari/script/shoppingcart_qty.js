function increaseQuantity() {
    quantityInput = document.getElementById("quantity");
    quantityInput.value = parseInt(quantityInput.value) + 1;
    updatePrice();
}

function decreaseQuantity() {
    quantityInput = document.getElementById("quantity");
    if (parseInt(quantityInput.value) > 1) {
        quantityInput.value = parseInt(quantityInput.value) - 1;
        updatePrice();
    }
}

function updatePrice() {
    costprice = document.getElementById("hidden-price").value;
    quantity = parseInt(document.getElementById("quantity").value);
    document.getElementById("total-price").innerText = `$${(costprice * quantity + 2.00).toFixed(2)}`;
}