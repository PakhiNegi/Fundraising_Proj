function validateForm() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
   

    // Validate username
    if (username == "") {
        alert("Please enter a username.");
        return false;
    }

    // Validate email
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.match(emailPattern)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Validate password
    if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        return false;
    }

    // If form is valid, display success message and link
    document.getElementById("registrationSuccess").classList.remove("hidden");
    document.getElementById("homeLink").classList.remove("hidden");

    return false; // Prevent default form submission
}
