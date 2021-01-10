<?php require_once 'controllers/register-user.php'; ?>
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

    <div class="main-content">

      <!--- HEADER START --->
      <div class="header-content">
        <div class="header-logo">
          <a href="home"><img src="img/website/travel-logo2.png"></a>
        </div>
      </div>
      <!--- HEADER END --->

      <!--- CONTACT FORM CONTENT START --->

      <div class="register-container">
        <div class="register-headline">
          <h2>Sign up to post your own story!</h2>
        </div>

        <div class="form">

          <span class="form-text"><?= $errors['feedback']; ?></span>
          <span name="feedback" class="form-text-success"><?= $success; ?></span>

          <form action="" name="contactForm" class="register-info" method="post">

          <div class="container register-form">
            <div class="form">
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="firstname">Firstname</label>
                                <input type="text" class="form-control" name="firstname" value="<?=$firstname?>"/>
                                <span class="form-text"><?= $errors['firstname']; ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                              <label for="lastname">Lastname</label>
                                <input type="text" class="form-control" name="lastname" value="<?=$lastname?>"/>
                                <span class="form-text"><?= $errors['lastname']; ?></span>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                              <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" value="<?=$email?>"/>
                                <span class="form-text"><?= $errors['email']; ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                              <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" value="<?=$username?>"/>
                                <span class="form-text"><?= $errors['username']; ?></span>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                              <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" value="<?=$password?>"/>
                                <span class="form-text"><?= $errors['password']; ?></span>
                                </div>

                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                              <label for="password-repeat">Repeat your password</label>
                                <input type="password" class="form-control" name="password-repeat" value="<?=$passwordRepeat?>"/>
                                <span class="form-text"><?= $errors['password-repeat']; ?></span>
                                </div>
                            </div>
                            </div>


                        </div>



                    </div>
                    <div class="btn-submit">
                      <input type="submit" name="submit" value="Submit" id="submit">
                      <p class="home">To go back to homepage, click <a href="home"><u>here</u></a></p>
                      <p class="home">You already have an account? To sign in click <a href="sign-in"><u>here</u></a></p>
                    </div>
                </div>
            </div>
        </div>
        </div>
</form>

    <!--- MAIN CONTENT END --->

    <!--- FOOTER START --->

    <div class="footer">
      <div class="footer-content">
        <div class="copyright">
          <p>Copyright Living Travel Life 2020. All rights reserved</p>
        </div>
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
