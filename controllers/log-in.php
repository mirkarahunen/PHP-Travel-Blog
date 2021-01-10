<?php

//ERROR MESSAGES
$errors = [];


//IF FORM NOT EMTPY
if (!empty($_POST))
{
	//VARIABLES
	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

	//SEND THE LOG-IN INFO TO THE DB
	if ($username && $password)
	{

    $sql = "SELECT *
						FROM users
  					WHERE username = '" . $username . "'
  					AND password = '" . sha1($password) . "'";

		// MAKE QUERY
		$userObj = mysqli_query($db, $sql);// or die('Abfragefehler: ' . mysqli_error($db));

  }


//VALIDATE USER AND WHEN SUCCESSFUL, SAVE THE SESSION
	if (mysqli_num_rows($userObj) === 1)
	{
		// Fetch user info from the database
		$user = mysqli_fetch_assoc($userObj);

		// If status is active, allow user to log in
		if($user['status'] === 'active')
		{
		// Authentication of the user -> Save user info on the started session
		$_SESSION['log-in'] = $user;


		// User will be transfered to the dashboard page
		header('Location: dashboard');
	} else {
		$errors['login-fail'] = 'Account has not yet been activated. Check your email';
	}
	} else {
		$errors['login-fail'] = 'Username or password is wrong. Please try again';
	}
}


?>
