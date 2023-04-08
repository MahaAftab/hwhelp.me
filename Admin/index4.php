<!DOCTYPE html>
<html>
<head>
  <title>Update Profile Image</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Include jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $(document).ready(function() {
      // Attach a change event listener to the file input
      $('#profile-image').change(function() {
        // Get the selected file
        var file = this.files[0];

        // Create a new FormData object
        var formData = new FormData();
        formData.append('file', file);

        // Send an AJAX request to update the profile image
        $.ajax({
          url: 'update_profile_image.php',
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function(data) {
            // Display a success message
            $('#message').text(data);
          },
          error: function(xhr, status, error) {
            // Display an error message
            $('#message').text(error);
          }
        });
      });
    });
  </script>
</head>
<body>
  <h1>Update Profile Image</h1>

  <form>
    <label for="profile-image">Select an image:</label>
    <input type="file" id="profile-image" name="profile-image">

    <div id="message"></div>
  </form>
</body>
</html>
