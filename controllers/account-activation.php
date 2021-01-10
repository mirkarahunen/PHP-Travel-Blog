<?php
$code = filter_var($_GET['verification_code'], FILTER_SANITIZE_STRING);

// If verification_code is correct
 if($code)
{

// Find user in the database
  $sql_user = "SELECT id FROM users WHERE verification_code = '". $code ."' AND status = 'inactive'";

  $result = mysqli_query($db, $sql_user);//or die('Abfragefehler: ' . mysqli_error($db));

// If query successful and user found, update the status to active
  if($result)
  {
    $sql = "UPDATE users SET status = 'active' WHERE verification_code = '". $code ."'";
    mysqli_query($db, $sql); //or die('Abfragefehler: ' . mysqli_error($db));
  }

} else {
  header('Location: register.php');
}
