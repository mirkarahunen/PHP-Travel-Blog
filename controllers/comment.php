<?php

// VARIABLES
$approval = 'Y';
$sql = "SELECT * FROM posts WHERE approval = '".$approval."' ORDER BY id DESC ";
$result = mysqli_query($db, $sql);

// If Post button is clicked
if ($_POST['submit']) {

  // Create variables
  $user_id = filter_var($_SESSION['log-in']['id'], FILTER_VALIDATE_INT);
  $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
  $image = filter_var($_POST['image_id'], FILTER_SANITIZE_STRING);

// Insert new comment into the database
$sql_img_com = "INSERT INTO comments (user_id, image, comment)
                VALUES ('".$user_id."','".$image."','".$comment."') ";

    mysqli_query($db, $sql_img_com); //or die('Abfragefehler: ' . mysqli_error($db));

}
