<?php

  if (isset($_SESSION["log-in"]))
  {

      // Initialize messages
      $error = [];
      $success = "";
      $approval = 'N';

      // If upload button is clicked ...
      if (isset($_POST["submit"]) && isset($_FILES))
      {
      	// Variables
      	$image = $_FILES["image"]["name"];
      	$tempImage = $_FILES["image"]["tmp_name"];
        $imageText = ucfirst(strtolower($_POST["image_text"]));
        $imageType = $_FILES["image"]["type"];
        $imageSize = $_FILES["image"]["size"];

        // Image extension
        $fileExt = explode(".", $image);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = ["jpg", "jpeg", "png"];


            // Check the size of the image
            if ($imageSize < 1024 * 1024 * 2)
            {

              $imageExp = explode( '.', $image);
              // Give image a unique name
              $imageFullName = $imageExp[0] . "-" . uniqid("", false) . "." . $fileActualExt;

              // image file directory
            	$target = "uploads/" . $imageFullName;

            } else {
              $error["feedback"] = "Image size too big. Only max. 2MB allowed";
            }
              // If image text is missing
              if (empty($imageText))
              {
                $error["feedback"] = "You need to say something about your image";
              }  else {
                    // Get text // Escape special characters in string
              	     mysqli_real_escape_string($db, $imageText);
                      }

      // Check if the uploaded image has the right extension
        if (in_array($fileActualExt, $allowed)) {

      // Move uploaded file to target "uploads" with the new filename
        move_uploaded_file($tempImage, $target);

          } else  {
             $error["feedback"] = "Wrong file extension. Only the following are accepter: jpg, jpeg and png";
          }



    if (empty($error)) {

    // Set user id for upload
      $user_id = $_SESSION['log-in']['id'];

    // Create sql and insert the information into database
      $sql = "INSERT INTO posts (user_id, image, image_text, approval)
              VALUES (' $user_id ',
              '" . $imageFullName . "',
              '" . $imageText . "',
              '" . $approval . "')";

    // execute query
      mysqli_query($db, $sql);// or die('Abfragefehler: ' . mysqli_error($db));

      $success = "Image uploaded successfully. Your image will be first approved and then posted on the website";
  } else {
      $error["feedback"] = "Failed to upload image. Check if the image size is max. 2MB or the file is jpg, jpeg or png";
        }
      }
    }

  // Logout from the session if not valid anymore
  else {
    $_SESSION["logged_out"] = "You need to log in again";
		header("Location: sign-in");
  }

?>
