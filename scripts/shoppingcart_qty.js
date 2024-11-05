// Not used
// function increaseQuantity(button) {
//     var quantityInput = button.previousElementSibling; // Get the input element before the button
//     quantityInput.value = parseInt(quantityInput.value) + 1;
//     updatePrice(button);
// }

// function decreaseQuantity(button) {
//     var quantityInput = button.nextElementSibling; // Get the input element after the button
//     if (parseInt(quantityInput.value) > 1) {
//         quantityInput.value = parseInt(quantityInput.value) - 1;
//         updatePrice(button);
//     }
// }

// function updatePrice(button) {
//     // Find the relevant price and total elements based on the button's context
//     var itemContainer = button.closest('.shopping-item'); // Assuming each item has a container with this class
//     var costprice = itemContainer.querySelector('.hidden-price').value;
//     var quantity = parseInt(itemContainer.querySelector('.quantity').value);
//     itemContainer.querySelector('.price').innerText = `$${(costprice * quantity + 2.00).toFixed(2)}`;
// }