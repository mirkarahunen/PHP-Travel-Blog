<?php


if (isset($_SESSION['log-in']))
{
  $id = filter_var($_SESSION['log-in']['id'], FILTER_VALIDATE_INT);

  // Show the number of posts of the user
  $sql_posts = "SELECT * FROM posts WHERE id=" . $id;
  $posts = mysqli_query($db, $sql_posts);

  // If user has posts, display them in dashboard

  if ($posts)
  {
    $sql = "SELECT COUNT(*) AS total FROM posts WHERE user_id=" .$id;
    $result = mysqli_query($db, $sql);

		$data_post = mysqli_fetch_assoc($result);
		return $data['total'];
  }

}

if (!isset($_SESSION['log-in']))
{

  header('Location: sign-in');
}
?>
