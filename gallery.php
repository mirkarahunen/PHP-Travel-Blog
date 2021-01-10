<?php require_once 'controllers/session_start.php';
      require_once 'controllers/comment.php';?>

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

    <!--- HEADER START --->
    <div class="header-content">
      <div class="header-logo">
        <a href="home"><img src="img/website/travel-logo2.png"></a>
        <div class="burger-menu">
          <button id="burger" type="button" name="button" class="click"><span class="burger"><i class="fa fa-bars"></i></span></button>
        </div>
      </div>
    </div>

    <!--- HEADER END --->

    <!--- NAVIGATION CONTENT--->
    <div class="navigation-content">
      <div class="main-navigation">
        <div class="navigation">
          <ul>
            <li class="nav"><a href="home">Home</a></li>
            <li class="nav">About us</li>
            <div class="dropdown">
              <li class="nav">Destinations<i class="fa fa-caret-down"></i></a></li>
              <div class="dropdown-content">
                <ul>
                  <li>Tansania</li>
                  <li>New York</li>
                  <li>Rio de Janeiro</li>
                </ul>
              </div>
            </div>
            <li class="nav">What to pack</li>
            <li class="nav active"><a href="gallery">Gallery</a></li>
          </ul>
        </div>
        <div class="sign-in">
          <ul>
            <?php if (isset($_SESSION['log-in'])):?>
              <li class="nav"><a href="dashboard">Dashboard</a></li>
              <li class="nav"><a href="sign-out">Sign out</a></li>
            <?php else: ?>
              <li class="nav"><a href="sign-in">Sign in</a></li>
              <li class="nav"><a href="register">Get started</a></li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </div>

    <!--- MOBILE NAVIGATION --->

    <div class="navigation mobile">
      <ul>
        <li class="nav"><a href="home">Home</a></li>
        <li>About us</li>
        <li class="mobile-toggle">Destinations<i class="fa fa-caret-down"></i></li>
        <div class="dropdown-content-mobile">
          <ul>
            <li>Tansania</li>
            <li>New York</li>
            <li>Rio de Janeiro</li>
          </ul>
        </div>
        <li>What to pack</li>
        <li class="nav"><a href="gallery">Gallery</a></li>
        <?php if (isset($_SESSION['log-in'])):?>
          <li class="nav"><a href="dashboard">Dashboard</a></li>
          <li class="nav"><a href="sign-out">Sign out</a></li>
        <?php else: ?>
          <li class="nav"><a href="sign-in">Sign in</a></li>
          <li class="nav"><a href="register">Get started</a></li>
        <?php endif ?>
      </ul>
    </div>


    <!--- MAIN CONTENT START --->

    <div class="main-content">
      <div class="gallery-content">
        <div class="gallery-headline">
          <h2>Gallery</h2>
          <?php if (isset($_SESSION['log-in'])):?>
            <br><p class="form-text-success">Want to upload your pictures? Then click here
            <div class="btn-submit">
      			<a href="upload"><input type="submit" name="upload" value="Upload" id="upload"></a>
      		   </div>
          <?php else: ?>
          <br><p class="form-text-success">Sign in to add your pictures in our gallery</p><br>
        <?php endif ?>
        </div>

        <div class="gallery-images">
          <?php while ($row = mysqli_fetch_assoc($result)):?>

              <div class="images">
                  <img src="uploads/<?=$row['image']?>" data-index="<?=$row['id']?>"
                  data-caption="<?=$row['image_text']?>" data-toggle="modal" data-target="#largeModal">

              </div>
            <?php endwhile ?>
              <!--- MAIN CONTENT END --->


              <!--- MODAL CONTENT START --->
              <?php

              $sql = "SELECT * FROM posts WHERE approval = '".$approval."' ORDER BY id DESC ";
              $result = mysqli_query($db, $sql);
              while($row = mysqli_fetch_assoc($result)): ?>

              <div id="modal-window-<?= $row[ 'id' ] ?>" class="modal">
                  <div class="modal-content-body">

                  <img src="uploads/<?=$row['image']?>" class="modal-content-image" id="modal-image-<?= $row[ 'id' ] ?>" data-caption="<?=$row['image_text']?>">

                  <div class="modal-controls">
                    <button class="prev-button" id="prev-button"><i class="fa fa-angle-left"></i></button>
                    <button class="next-button" id="next-button"><i class="fa fa-angle-right"></i></button>
                  </div>
                  <div class="modal-content modal-dialog modal-dialog modal-dialog-scrollable modal-m" role="document">
                    <div class="modal-header data-caption"><span id="closeButton"><i class="fa fa-window-close"></i></span>
                      <h4 class="modal-title" id="exampleModalLabel">Comments</h4>
                    </div>
                    <div class="modal-body" id="modal-window">

                      <?php  $sql_com = "SELECT * FROM comments
                                         LEFT JOIN users ON comments.user_id = users.id
                                         WHERE image = '".$row['image']."'";
                              $result_com = mysqli_query($db, $sql_com);
                              while($row_com = mysqli_fetch_assoc($result_com)):?>

                      <div class="user-comments">
                        <div class="comments">
                          <div class="user">
                            <p><?=$row_com['username']?></p>
                            <p class="time"><?=$row_com['posted_at']?></p>
                          </div>
                          <div class="user-comment">
                            <p><?=$row_com['comment']?></p>
                          </div>
                        </div>
                      </div>
                    <?php endwhile ?>
                    </div>

                    <div class="modal-footer">
                      <?php if(!isset($_SESSION['log-in'])):?>
                      <p class="form-text-success"> Sign in to comment images </p>
                      <button type="button" class="btn"><a href="sign-in">Sign in</a></button>
                    <?php else: ?>
                      <div class="form-group">
                      <form method="post" class="comment-post">

                        <input type="text" name="comment" class="form-control" value="">
                        <input type="hidden" name="image_id" class="form-control" value="<?=$row['image']?>">
                        <input type="submit" name="submit" class="comment" value="Post" id="submit">

                      </form>
                    </div>
                  <?php endif ?>
                    </div>
                  </div>

                </div>
                <div class="data-caption">
                  <h2 id="largeModalLabel"><?=$row['image_text']?></h2>
                </div>
              </div>

      <!--- MODAL CONTENT END --->
    <?php endwhile ?>

          </div>
        </div>
      </div>
    </div>


    <!--- FOOTER START --->
    <div class="footer">
      <div class="footer-content">
        <div class="copyright">
          <p>Copyright Living Travel Life 2020. All rights reserved</p>
        </div>
        <div class="footer-links">
          <ul>
            <li class="footer-nav"><a href="">Contact</a></li>
            <li class="footer-nav"><a href="">Press</a></li>
          </ul>
          <div class="footer-icons">
            <ul>
              <li><a href="https://www.facebook.com" target="_blank"><img src="img/website/facebook.png" alt=""></a></li>
              <li><a href="https://www.instagram.com" target="_blank"><img src="img/website/instagram.png" alt=""></a></li>
              <li><a href="https://www.twitter.com" target="_blank"><img src="img/website/twitter.png" alt=""></a></li>
              <li><a href="https://www.youtube.com" target="_blank"><img src="img/website/youtube.png" alt=""></a></li>
              <li><a href="https://www.pinterest.com" target="_blank"><img src="img/website/pinterest.png" alt=""></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--- FOOTER END --->

  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <script src="js/navigation.js" charset="utf-8"></script>
  <script src="js/backtotop.js" charset="utf-8"></script>
  <script src="js/gallery.js" charset="utf-8"></script>
</body>

</html>
