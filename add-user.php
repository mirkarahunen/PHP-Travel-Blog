<?php require_once 'controllers/session_start.php';
      require_once 'controllers/new-user.php';  ?>


      <!DOCTYPE html>
      <html lang="en" dir="ltr">

      <head>
        <meta charset="utf-8">
        <title>Living travel life</title>

        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/7570548c60.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/master.css">
        <link rel="stylesheet" href="css/media-query.css">
      </head>

      <body>
        <div class="page-content-back">

          <button type="button" name="back-to-top" id="back-to-top-btn"><i class="fa fa-angle-double-up"></i></button>

          <!--- HEADER START --->
          <div class="header-content">
              <div class="burger-menu">
                <button id="burger" type="button" name="button" class="click"><span class="burger"><i class="fa fa-bars"></i></span></button>
            </div>
          </div>

          <!--- HEADER END --->

          <!--- NAVIGATION CONTENT--->
          <div class="navigation-content-back">
            <div class="main-navigation">
              <div class="navigation">

                <ul>
                  <li class="logo-text">Living travel life</li>
                  <li class="nav"><a href="home" class="back">Home</a></li>
                  <li class="nav"><a href="dashboard" class="back">Dashboard</a></li>
                  <li class="nav"><a href="posts" class="back">Posts</a></li>
                  <li class="nav"><a href="comments" class="back">Comments</a></li>
                  <li class="nav"><a href="upload" class="back">Add posts</a></li>
                  <li class="nav"><a href="users" class="back">Users</a></li>
                </ul>
              </div>
              <div class="sign-in">
                <ul>
                  <li class="nav"><a href="sign-out">Sign out</a></li>
                </ul>
              </div>
            </div>
          </div>

          <!--- MOBILE NAVIGATION --->

          <div class="navigation mobile back">
            <ul>
              <li class="nav"><a href="home">Home</a></li>
              <li class="nav"><a href="dashboard">Dashboard</a></li>
              <li class="nav"><a href="posts">Posts</a></li>
              <li class="nav"><a href="comments">Comments</a></li>
              <li class="nav"><a href="upload">Add posts</a></li>
              <li class="nav"><a href="users">Users</a></li>

            </ul>
            <div class="sign-in">
              <ul>
                <li class="nav"><a href="sign-out">Sign out</a></li>
              </ul>
            </div>
          </div>

    <!--- MAIN CONTENT START --->
    <div class="page-content">

     <div class="edit-headline">
       <h2>Add New User</h2>
       <span name="feedback" class="form-text-success"><?= $success; ?></span>
       <span class="form-text"> <?= $errors['feedback']; ?> </span>
     </div>

       <div class="edit-container">
       <div class="edit-content">

         <form class="form" action="" method="post">
           <div class="container register-form">
             <div class="form">
                 <div class="form-content">
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                               <label for="firstname">Firstname</label>
                                 <input type="text" class="form-control" name="firstname" value="<?=$_POST['firstname']?>"/>
                                 <span class="form-text"><?= $errors['firstname']; ?></span>
                                 </div>
                             </div>
                             <div class="col-md-6">
                             <div class="form-group">
                               <label for="lastname">Lastname</label>
                                 <input type="text" class="form-control" name="lastname" value="<?=$_POST['lastname']?>"/>
                                 <span class="form-text"><?= $errors['lastname']; ?></span>
                                 </div>
                                 </div>
                             </div>
                             <div class="row">
                             <div class="col-md-6">
                             <div class="form-group">
                               <label for="email">Email</label>
                                 <input type="text" class="form-control" name="email" value="<?=$_POST['email']?>"/>
                                 <span class="form-text"><?= $errors['email']; ?></span>
                                 </div>
                             </div>
                             <div class="col-md-6">
                             <div class="form-group">
                               <label for="username">Username</label>
                                 <input type="text" class="form-control" name="username" value="<?=$_POST['username']?>"/>
                                 <span class="form-text"><?= $errors['username']; ?></span>
                                 </div>
                             </div>
                             </div>
                             <div class="row">
                             <div class="col-md-6">
                             <div class="form-group">
                               <label for="password">Password</label>
                                 <input type="password" class="form-control" name="password" value="<?=$_POST['password']?>"/>
                                 <span class="form-text"><?= $errors['password']; ?></span>
                                 </div>
                                </div>

                                 <div class="col-md-6">
                                 <div class="form-group">
                                   <label for="role">Role</label>
                                   <select class="form-control" name="role">
                                     <option value="role" selected>Select an option</option>
                                     <option value="U">U</option>
                                     <option value="A">A</option>
                                   </select>
                                   <span class="form-text"> <?= $errors['role']; ?></span>
                                 </div>
                               </div>
                             </div>


                           <div class="btn-submit">
                             <input type="submit" name="submit" value="Add" id="submit">
                           </div>
       </form>
       </div>
      </div>
</div>
      <!--- MAIN CONTENT END --->

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="js/navigation-back.js" charset="utf-8"></script>
    </body>
    </html>
