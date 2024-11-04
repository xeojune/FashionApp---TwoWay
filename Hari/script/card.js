function toggleCardForm() {
    paymentMethod = document.getElementById("payment-method").value;
    creditCardDetails = document.getElementById("credit-card-details");
    banktransfer = document.getElementById("banktransfer");

    if (paymentMethod === "credit-card") {
        creditCardDetails.style.display = "block";
        banktransfer.style.display = "none";
    } else if (paymentMethod === "bank-transfer") {
        creditCardDetails.style.display = "none";
        banktransfer.style.display = "block";
    } else {
        creditCardDetails.style.display = "none";
        banktransfer.style.display = "none";
    }
}