<?php

// IF SESSION NOT VALID, REDIRECT TO LOGIN PAGE
  if (!isset($_SESSION['log-in']))
  {
    header ('location: sign-in');
  }

// Variables
$role = filter_var($_SESSION['log-in']['role'], FILTER_SANITIZE_STRING);
$user_id = filter_var($_SESSION['log-in']['id'], FILTER_VALIDATE_INT);

// If role is user, show only own data
if ($role === 'U')
{
  $sql = "SELECT *
          FROM users
          WHERE id=" .$user_id;
  $user = mysqli_query($db, $sql);

} else {
  // If role is "A" as Admin
  // Show all users from the database
  $sql = "SELECT *
          FROM users";
  $user = mysqli_query($db, $sql);


// DELETE USER FROM THE USERS LIST
if (isset($_GET['delete_id']))
{
  $id = filter_var($_GET['delete_id'], FILTER_VALIDATE_INT);
  mysqli_query($db, "DELETE FROM users WHERE id=" . $id);
  header('Location: users');
}


  }
 ?>
