function ValidateForm() {
    var password = document.registerForm.password;
    var username = document.registerForm.username;
    var email = document.registerForm.email;
    var phone = document.registerForm.phone;
    if (ValidateUsername(username, 6, 20) && onlyLetter(username) && ValidatePassword(password, 6, 20)
        && ValidateEmail(email) && ValidatePhone(phone)) {
        alert("Your registered information is VALID! Thank you");
        return true;
    }
    return false;
}

function ValidateUsername(username, min, max) {
    var usernameLength = username.value.length;
    if (usernameLength == 0) {
        alert("Username is NOT filled");
        username.focus();
        return false;
    }
    else if (usernameLength >= max || usernameLength < min) {
        alert("Username SHOULD be between " + min + " to " + max + " characters");
        username.focus();
        return false;
    }
    else {
        return true;
    }
}

function ValidatePassword(password, min, max) {
    var passwordLength = password.value.length;
    if (passwordLength == 0) {
        alert("Password is NOT filled");
        password.focus();
        return false;
    }
    else if (passwordLength >= max || passwordLength < min) {
        alert("Password SHOULD be between " + min + " to " + max + " characters");
        password.focus();
        return false;
    }
    else {
        return true;
    }
}

function onlyLetter(username) {
    var letters = /^[A-Za-z]+$/;
    if (username.value.match(letters)) {
        return true;
    }
    else {
        alert('Username SHOULD have alphabetical characters');
        username.focus();
        return false;
    }
}

function ValidatePhone(phone) {
    var phoneFormat = /^[0][0-9]{9}/;
    var phoneLength = phone.value.length;
    if (phone.value.match(phoneFormat)) {
        return true;
    }
    else if (phoneLength == 0) {
        alert("Phone is NOT filled");
        phone.focus();
        return false;
    }
    else {
        alert('Phone number SHOULD have length of 10 numbers and start with 0');
        phone.focus();
        return false;
    }
}

function ValidateEmail(email) {
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var emailLength = email.value.length;
    if (email.value.match(mailformat)) {
        return true;
    }
    else if (emailLength == 0) {
        alert("Email is NOT filled");
        email.focus();
        return false;
    }
    else {
        alert("Email is in INVALID format\nExample: abcs@gmail.com");
        email.focus();
        return false;
    }
}