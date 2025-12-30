document.getElementById("loginForm").addEventListener("submit", function(event) {
  var username = document.getElementById("username").value.trim();
  var password = document.getElementById("password").value.trim();
  var errorElement = document.getElementById("error");

  if (username === "" || password === "") {
      event.preventDefault();
      errorElement.textContent = "Please fill in all fields";
  } else {
      errorElement.textContent = "";
  }

  // Assuming you have a way to determine if the login was successful
  var loginSuccessful = true; // Set to true or false based on your logic

  if (loginSuccessful) {
      // Display the success message directly
      var messageBox = document.createElement("div");
      messageBox.classList.add("message-box");
      messageBox.textContent = "Login successful!";
      document.body.appendChild(messageBox);
  }
});
