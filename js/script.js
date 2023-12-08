function displayMessage(message, messageType) {
    var messageElement = document.createElement("div");
    messageElement.className = messageType; 
    messageElement.innerHTML = message;
    document.body.appendChild(messageElement);
    setTimeout(function () {
        document.body.removeChild(messageElement);
    }, 4000);
}

function validateForm() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm_password").value;

    if (username.trim() === "" || password.trim() === "") {
        displayMessage("Username and password are required.", "error");
        return false;
    }

    if (password !== confirmPassword) {
        displayMessage("Password and confirmation do not match.", "error");
        return false;
    }

    displayMessage("Form submitted successfully!", "success");

    return true;
}
