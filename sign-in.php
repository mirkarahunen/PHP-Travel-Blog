<?php require_once 'controllers/session_start.php';
      require_once 'controllers/log-in.php';
      ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Living travel life</title>

  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/7570548c60.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/media-query.css">
</head>

<body>
  <div class="page-content">
    <button type="button" name="back-to-top" id="back-to-top-btn"><i class="fa fa-angle-double-up"></i></button>

    <!--- MAIN CONTENT START --->

	<div class="sign-in-container">

    <!--- HEADER START --->
    <div class="header-content">
      <div class="header-logo">
        <a href="home"><img src="img/website/travel-logo2.png"></a>
      </div>
    </div>
    <!--- HEADER END --->

		<div class="sign-in-headline">

			<h3>Log in to your account!</h3>
	</div>
	<div class="form-sign-in">
	<form action="" method="POST">
    <span class="form-text"><?= $errors['login-fail']; ?></span>

    <div class="form-group">
			<i class="fas fa-user"></i>
      <label for="username">Username</label>
			<input class="form-control" type="text" name="username" value="<?= $username;?>">
		</div>

		<div class="form-group">
      <i class="fas fa-unlock-alt"></i>
      <label for="password">Password</label>
			<input class="form-control" type="password" name="password" value="<?= $password;?>" >
		</div>
		<div class="btn-submit">
			<input type="submit" name="log-in" value="Log in" id="log-in">
      <p class="home">To go back to homepage, click <a href="home"><u>here</u></a></p>
      <p class="home">Don't have an account yet? To register, click <a href="register"><u>here</u></a></p>
		</div>
	</form>
	</div>

	</div>

  <!--- MAIN CONTENT END --->

  <!--- FOOTER START --->

  <div class="footer">
    <div class="footer-content">
      <div class="copyright">
        <p>Copyright Living Travel Life 2020. All rights reserved</p>
      </div>
  </div>
  <!--- FOOTER END --->

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="js/backtotop.js" charset="utf-8"></script>
</body>
</html>
