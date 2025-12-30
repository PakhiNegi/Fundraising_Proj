document.getElementById('saveBtn').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default form submission
    
    // Fetch form data
    var formData = new FormData(document.getElementById('accountForm'));
    
    // Make AJAX request to server
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_account.php');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          alert(xhr.responseText); // Alert response from server
        } else {
          alert('Error: ' + xhr.status); // Alert error status
        }
      }
    };
    xhr.send(formData); // Send form data to server
  });
  // Function to preview selected image
document.getElementById('profilePic').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var preview = document.getElementById('preview');
    
    if (file) {
      var reader = new FileReader();
      reader.onload = function(e) {
        var img = new Image();
        img.src = e.target.result;
        preview.innerHTML = '';
        preview.appendChild(img);
      };
      reader.readAsDataURL(file);
    } else {
      preview.innerHTML = '';
    }
  });
  