<?php

// IF SESSION NOT VALID, REDIRECT TO LOGIN PAGE
  if (!isset($_SESSION['log-in']))
  {
    header('location: sign-in');
  }

// ERROR MESSAGES
  $errors = [];
  $success = '';

  if (isset($_GET['id']))
  {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    $sql = "SELECT * FROM users WHERE id=" . $id;
    $userObj = mysqli_query($db, $sql);
    $user = mysqli_fetch_assoc($userObj);

  }


// UPDATE USERDATA
  if(!empty($_POST))
  {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT) ?? '';


    if ($id)
		{
      //Variables for posted information
      $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
      $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
      $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
      $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
      $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
      $role = filter_var($_POST['role'], FILTER_SANITIZE_STRING);
      $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

      $sql = "UPDATE users SET
      firstname = '" . $firstname . "',
      lastname = '" . $lastname . "',
      email = '" . $email . "',
      username = '" . $username . "',
      password = '" . sha1($password) . "',
      role = '" . $role . "',
      status = '" . $status . "'
      WHERE id=" . $id;
var_dump($sql);

      $updateUser = mysqli_query($db, $sql)or die(mysqli_error($db));

      if ($updateUser)
      {
        $success = 'Update was successful';
        header('refresh:3; url=users');
      } else {
        $errors['update-fail'] = "Update not possible. Check your data and fill in all the fields. ";
      }
    }
  }




 ?>
