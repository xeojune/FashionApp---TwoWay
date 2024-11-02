// Get DOM address of the elements and register the event handlers
var nameNode = document.getElementById("name");
var emailNode = document.getElementById("email");

nameNode.addEventListener("change", chkName, false);
emailNode.addEventListener("change", chkEmail, false);

document.getElementById("myForm").onsubmit = chkForm;

// Function to check form
function chkForm(){
    var pass = document.getElementById("pass")
    var verifypass = document.getElementById("verifypass")
    var nameNode = document.getElementById("name");
    var emailNode = document.getElementById("email");

    if (nameNode.value == ""){
        alert("You did not enter a username \n" + "Please enter one now");
        nameNode.focus();
        return false;
    }

    if (emailNode.value == ""){
        alert("You did not enter email \n" + "Please enter one now");
        emailNode.focus();
        return false;
    }

    if (pass.value == ""){
        alert("You did not enter a password \n" + "Please enter one now");
        pass.focus();
        return false;
    }
    
    if (pass.value != verifypass.value){
        alert ("The two passwords you entered are not the same \n" + "Please re-enter both now");
        pass.focus();
        verifypass.select();
        return false;
    } else {
        return true;
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
    myName.value = "";
    alert("The name you entered (" + myName.value +
        ") is not in the correct form. \n" +
        "It should only contain alphabet characters and character spaces.");
    myName.focus();  // Set focus back to the name input field
    myName.select(); // Select the text in the input field for easy editing
    return false;
    }
}

// Function to check email
function chkEmail(event) {

    // Get the input element that triggered the event
    var myEmail = event.currentTarget;

    // 1. `^[\w.-]*`: 
    //    - `^` asserts the start of the string.
    //    - `[\w.-]*` allows any number of alphanumeric characters (`\w`), periods (`.`), or hyphens (`-`)

    // 2. `@`: 
    //    - This is the literal "@" symbol that separates name part and domain name part

    // 3. `([\w-]*\.){1,3}`:
    //    - `[\w-]*` allows alphanumeric characters and hyphens in the domain label.
    //    - `\.` matches the literal dot that separates domain labels.
    //    - `{1,3}` allows between 1 and 3 of these domain labels

    // 4. `[a-zA-Z]{2,3}$`: 
    //    - `[a-zA-Z]{2,3}` ensures that the top-level domain (TLD) is made up of 2 to 3 alphabetic characters
    //    - `$` asserts the end of the string.

    var pos = myEmail.value.search(/^[\w.-]+@([\w-]*\.){1,3}[a-zA-Z]{2,3}$/);

    if (pos != 0) {
        alert("The name you entered (" + myEmail.value +
        ") is not in the correct form. \n" +
        "For email it contains a username part follows by @ and a domain name part. The user name contains word characters including hypen and a period.\n" +
        "The domain contains two to four address extensions. \n" +
        "Each extension is string of word characters and separated from the others by a period. \n" +
        "The last extension must have two to three characters");
        myEmail.focus();
        myEmail.select();
        myEmail.value = "";
        return false;
    }
}