document.getElementById("logform").onsubmit = chkForm;

// Function to check form
function chkForm(){
    var name = document.getElementById("name");
    var password = document.getElementById("password");

    if (name.value == "" && password.value == ""){
        alert("You did not enter username and password");
        name.focus();
        return false;
    }

    if (name.value == ""){
        alert("You did not enter username");
        name.focus();
        return false;
    }

    if (password.value == ""){
        alert("You did not enter password");
        password.focus();
        return false;
    }
}