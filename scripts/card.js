var nameNode = document.getElementById("name");
var cardnumber = document.getElementById("card-number");
var cardname = document.getElementById("card-name");
var ccv = document.getElementById("card-ccv");
var expirydate = document.getElementById("expire-date");
var banknumber = document.getElementById("bank-number");
var accName = document.getElementById("name");
var bankName = document.getElementById("bank-name");

nameNode.addEventListener("change", chkName, false);
cardname.addEventListener("change", chkName, false);
accName.addEventListener("change", chkName, false);
bankName.addEventListener("change", chkName, false);
cardnumber.addEventListener("change", chkCardNo, false);
banknumber.addEventListener("change", chkCardNo, false);
ccv.addEventListener("change", chkCCV, false);
expirydate.addEventListener("change", chkDate, false);

function toggleCardForm() {
    var paymentMethod = document.getElementById("payment-method").value;
    var creditCardDetails = document.getElementById("credit-card-details");
    var banktransfer = document.getElementById("banktransfer");

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

// Function to check name
function chkName(event){

    // Get the input element that triggered the event
    var myName = event.currentTarget;

    // Check if the name contains only alphabetic characters and spaces
    // $ is to ensure that the match goes all the way to the end of the string.
    var pos = myName.value.search(/^[A-Za-z ]+$/); // Updated regex to match one or more characters

    if (pos != 0) {
    alert("The name you entered (" + myName.value +
        ") is not in the correct form. \n" +
        "It should only contain alphabet characters and character spaces.");
    myName.value = "";
    myName.focus();  // Set focus back to the name input field
    myName.select(); // Select the text in the input field for easy editing
    return false;
    }
}

// Function to check card
function chkCardNo(event){

    // Get the input element that triggered the event
    var myCardNo = event.currentTarget;

    // Check if the name contains only alphabetic characters and spaces
    // $ is to ensure that the match goes all the way to the end of the string.
    var pos = myCardNo.value.search(/^\d{16}$/); // Updated regex to match one or more characters

    if (pos != 0) {
    alert("The name you entered (" + myCardNo.value +
        ") is not in the correct form. \n" +
        "It should contain 16 numbers only.");
    myCardNo.value = "";
    myCardNo.focus();  // Set focus back to the name input field
    myCardNo.select(); // Select the text in the input field for easy editing
    return false;
    }
}

// Function to check ccv
function chkCCV(event){

    // Get the input element that triggered the event
    var  myCCV = event.currentTarget;

    // Check if the name contains only alphabetic characters and spaces
    // $ is to ensure that the match goes all the way to the end of the string.
    var pos = myCCV.value.search(/^\d{3}$/); // Updated regex to match one or more characters

    if (pos != 0) {
    alert("The name you entered (" + myCCV.value +
        ") is not in the correct form. \n" +
        "It should contain 3 numbers only.");
    myCCV.value = "";
    myCCV.focus();  // Set focus back to the name input field
    myCCV.select(); // Select the text in the input field for easy editing
    return false;
    }
}

// Function to check expiry date
function chkDate(event){

    // Get the input element that triggered the event
    var  myExpDate = event.currentTarget;

    // Check if the name contains only alphabetic characters and spaces
    // $ is to ensure that the match goes all the way to the end of the string.
    var pos = myExpDate.value.search(/^(0[1-9]|1[0-2])\/\d{2}$/); // Updated regex to match one or more characters

    if (pos != 0) {
    alert("The name you entered (" + myExpDate.value +
        ") is not in the correct form. \n" +
        "It should be in this format MM/YY.");
    myExpDate.value = "";
    myExpDate.focus();  // Set focus back to the name input field
    myExpDate.select(); // Select the text in the input field for easy editing
    return false;
    }
}