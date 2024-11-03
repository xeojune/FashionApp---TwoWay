function increaseQuantity() {
    let quantityInput = document.getElementById("quantity");
    quantityInput.value = parseInt(quantityInput.value) + 1;
    updatePrice();
}

function decreaseQuantity() {
    let quantityInput = document.getElementById("quantity");
    if (parseInt(quantityInput.value) > 1) {
        quantityInput.value = parseInt(quantityInput.value) - 1;
        updatePrice();
    }
}

function updatePrice() {
    const unitPrice = 795; // Base price
    let quantity = parseInt(document.getElementById("quantity").value);
    document.getElementById("total-price").innerText = `$${(unitPrice * quantity).toFixed(2)}`;
}