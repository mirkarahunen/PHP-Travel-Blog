<?php

// Connect to database
require_once 'inc/debug.php';
require_once 'inc/database.php';


// VARIABLES
$firstname = '';
$lastname = '';
$email = '';
$username = '';
$password = '';
$passwordRepeat = '';
$role = 'U';
$status = 'inactive';
$verificationCode = md5(time());

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
    $passwordRepeat = filter_var($_POST['password-repeat'], FILTER_SANITIZE_STRING) ?? '';



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
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Not a valid email <br>';
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

  // Validate password / passwords
  if (empty($password)) $errors['password'] = 'A password is required <br>';
  if (strlen($password) < 8) $errors['password'] = 'Password does not meet the requirements';
  if ($password !== $passwordRepeat) $errors['password-repeat'] = 'The passwords do not match';


  //--------- VALIDATION SUCCESSFUL / UNSUCCESSFUL -------------//

  // If no error messages are shown, proceed to add the info to the database

    if(empty($errors))
    {
      // Add to database
      $sql_user = "INSERT INTO users
      (firstname, lastname, email, username, password, role, status, verification_code)
      VALUES ('" . $firstname . "',
              '" . $lastname . "',
              '" . $email . "',
              '" . $username . "',
              '" . sha1($password) . "',
              '" . $role . "',
              '" . $status . "',
              '" . $verificationCode . "')";


        // Send query to the database
        mysqli_query($db, $sql_user);// or die('Abfragefehler: ' . mysqli_error($db));

        $success = 'Registration was successful. We have sent you an email to activate your account';
        if ($success)
        {
          require_once 'PHPMailer/mailer.php';
        }

      } else {
        $errors['feedback'] = 'Registration was not successful. Please try again';


      }
}



?>
