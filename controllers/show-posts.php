<?php

// IF SESSION NOT VALID, REDIRECT TO LOGIN PAGE
  if (!isset($_SESSION['log-in']))
  {
    header ('location: sign-in');
  }

// VARIBLES

$user_id = filter_var($_SESSION['log-in']['id'], FILTER_VALIDATE_INT);
$role = filter_var($_SESSION['log-in']['role'], FILTER_SANITIZE_STRING);
$approval = filter_var($_POST['approval'], FILTER_SANITIZE_STRING);
$id = filter_var($_POST['post_id'], FILTER_VALIDATE_INT);

// If the user role is 'U', meaning normal user
if ($role === 'U')
{

    // Show only own posts
    $sql = "SELECT *
            FROM posts
            WHERE user_id = " . $user_id;

    $result = mysqli_query($db, $sql);// or die(mysqli_error($db));


    // DELETE POST FROM THE LIST

    if (isset($_GET['delete_id']))
    {

      $img_delete = filter_var($_GET['delete_id'], FILTER_VALIDATE_INT);
      $sql = "DELETE FROM posts WHERE id =" . $img_delete;

      mysqli_query($db, $sql);// or die(mysqli_error($db));
      header('Location: posts');
    }

    // Else if the user role is 'A', meaning admin
  } else {

    // Show all posts from all users
    $sql = "SELECT users.*, posts.*
            FROM users
            INNER JOIN posts
            WHERE posts.user_id = users.id";

    $result = mysqli_query($db, $sql);// or die(mysqli_error($db));

// Change image approval status N/Y

//If submit button was clicked
    if (isset($_POST['submit']))
    {
// Update info in database
      $sql = "UPDATE posts
              SET approval = '" . $approval . "'
              WHERE id = '".$id."'";

  // Make query
      $result = mysqli_query($db, $sql);//or die(mysqli_error($db));
      if ($result)
      {
        header('Location: posts');
      }

}

  // DELETE POST AND ITS COMMENTS FROM THE LIST

  if (isset($_GET['delete_image']))
  {

    $img_delete = filter_var($_GET['delete_image'], FILTER_SANITIZE_STRING);
    $sql_del_img = "DELETE FROM posts WHERE image = '".$img_delete."'";
    $sql_del_com = "DELETE FROM comments WHERE image = '".$img_delete."'";

    mysqli_query($db, $sql_del_com);// or die(mysqli_error($db));
    mysqli_query($db, $sql_del_img);// or die(mysqli_error($db));

    header('Location: posts');
  }
}





 ?>
