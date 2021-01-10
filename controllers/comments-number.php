<?php

if (isset($_SESSION['log-in']))
{
  $id = $_SESSION['log-in']['id'];

  // Show the number of comments of the user
  $sql_comments = "SELECT * FROM comments WHERE id=" . $id;
  $comments = mysqli_query($db, $sql_comments);


  // If user has comments, display them in dashboard

  if ($comments)
  {

    $sql = "SELECT COUNT(*) AS total FROM comments WHERE user_id=" .$id;
    $result = mysqli_query($db, $sql); //or die('Abfragefehler: ' . mysqli_error($db));

		$data_comm = mysqli_fetch_assoc($result);
		return $data_comm['total'];
  }
}

if (!isset($_SESSION['log-in']))
{

  header('Location: sign-in');
}

?>
