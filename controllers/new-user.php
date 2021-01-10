<?php
// IF SESSION NOT VALID, REDIRECT TO LOGIN PAGE
  if (!isset($_SESSION['log-in']))
  {
    header ('location: sign-in');
  }

$firstname = '';
$lastname = '';
$email = '';
$username = '';
$password = '';
$passwordRepeat = '';
$role = '';


//ERROR MESSAGES
$errors = [];


// VALIDATION BEFORE PROCESSING AND SENDING THE FORM
if (isset($_POST['submit']))
{

  //VARIABLES
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING) ?? '';
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING) ?? '';
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ?? '';
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING) ?? '';
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING) ?? '';
    $role = filter_var($_POST['role'], FILTER_SANITIZE_STRING);
    $status = filter_var('inactive', FILTER_SANITIZE_STRING);
    $verificationCode = md5(time());

  //--------- REGISTRATION VALIDATION -------------//


  // Validate firstname
  if (empty($firstname)) $errors['firstname'] = 'A firstname is required <br>';

  // Validate lastname
  if (empty($lastname)) $errors['lastname'] = 'A lastname is required <br>';

  // Validate email
  if (empty($email))
  {
    $errors['email'] = 'An email address is required <br>';
  } else
    {
      if (!$email) $errors['email'] = 'Not a valid email <br>';
    }

    // Check if email already exists
    $sql = "SELECT username FROM users WHERE email = '" . $email . "'";
    $userEmail = mysqli_query($db, $sql);

    if (mysqli_num_rows($userEmail) > 0) $errors['email'] = 'This email is already taken. Register with another one <br>';

  // Validate username
  if (empty($username)) $errors['username'] = 'A username is required <br>';

  // Check if the username already exists
  $sql = "SELECT username FROM users WHERE username = '" . $username . "'";
  $user = mysqli_query($db, $sql);

  if (mysqli_num_rows($user) > 0) $errors['username'] = 'This username is already taken. Choose another one <br>';

  // Validate password
  if (empty($password)) $errors['password'] = 'A password is required <br>';
  if (strlen($password) < 8) $errors['password'] = 'Password needs to at least 8 characters long';

  // Validate role
  if ($_POST['role'] === "role") $errors['role'] = 'Choose one of the two options <br>';


  //--------- VALIDATION SUCCESSFUL / UNSUCCESSFUL -------------//

  // If no errors
    if(empty($errors))
    {

      // Insert new user info into the database
        $sql = "INSERT INTO users (firstname, lastname, email, username, password, role, status, verification_code)
        VALUES ('" . $firstname ."',
                '" . $lastname . "',
                '" . $email . "',
                '" . $username . "',
                '" . sha1($password) . "',
                '" . $role . "',
                '" . $status . "',
                '" . $verificationCode . "')";

        // Make query
        mysqli_query($db, $sql);// or die('Abfragefehler: ' . mysqli_error($db));

      $success = 'New user is added. Activation email has been sent';
      if ($success)
      {
        require_once 'PHPMailer/mailer.php';
        header('refresh:3; url=users');
      }

    }
    else
    {
      $errors['feedback'] = 'Something went wrong. Check the filled in data and try again';
    }

   }

?>
