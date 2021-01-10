<?php

// IF SESSION NOT VALID, REDIRECT TO LOGIN PAGE
  if (!isset($_SESSION['log-in']))
  {
    header ('location: sign-in');
  }

// VARIBLES
$role = filter_var($_SESSION['log-in']['role'], FILTER_SANITIZE_STRING);
$user_id = filter_var($_SESSION['log-in']['id'], FILTER_VALIDATE_INT);

// If role is user
if ($role === 'U')
{
    // Show only own comments
    $sql = "SELECT *
            FROM comments
            WHERE user_id = " . $user_id;

    $result = mysqli_query($db, $sql);// or die(mysqli_error($db));


    // Delete own posts
    if (isset($_GET['delete_id']))
    {
      $id_delete = filter_var($_GET['delete_id'], FILTER_VALIDATE_INT);
      $sql = "DELETE FROM comments WHERE id =" . $id_delete;
      mysqli_query($db, $sql);// or die(mysqli_error($db));
      header('Location: comments');
    }
    // Else if the role is "A" for Admin
  } else {

  // Show all comments of all users
    $sql = "SELECT *
            FROM users
            JOIN comments
            WHERE comments.user_id = users.id";

  $result = mysqli_query($db, $sql);// or die(mysqli_error($db));

  // Delete any comment from the list
  if (isset($_GET['delete_id']))
  {
    $id_delete = filter_var($_GET['delete_id'], FILTER_VALIDATE_INT);
    $sql = "DELETE FROM comments WHERE id =" . $id_delete;
    mysqli_query($db, $sql);// or die(mysqli_error($db));
    header('Location: comments');
  }
}
 ?>
