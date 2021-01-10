<?php

if (isset($_SESSION['log-in']))
{
  // Show the number of users
  $sql_users = "SELECT * FROM users";
  $users = mysqli_query($db, $sql_users);


  // If users, display them in dashboard

  if ($users)
  {

    $sql = "SELECT COUNT(*) AS total FROM users";
    $result = mysqli_query($db, $sql); //or die('Abfragefehler: ' . mysqli_error($db));

		$data_users = mysqli_fetch_assoc($result);
		return $data_users['total'];
  }
}

if (!isset($_SESSION['log-in']))
{

  header('Location: sign-in');
}

?>
