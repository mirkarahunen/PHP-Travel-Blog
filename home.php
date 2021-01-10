<?php require_once 'controllers/session_start.php';?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Living travel life</title>

  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <a href="home" name="header-anchor"><img src="img/website/travel-logo2.png"></a>
        <div class="burger-menu">
          <button id="burger" type="button" name="button" class="click"><span class="burger"><i class="fa fa-bars"></i></span></button>
        </div>
      </div>
    </div>

    <!--- MOBILE NAVIGATION --->

    <div class="navigation mobile">
      <ul>
        <li class="nav"><a href="home">Home</a></li>
        <li>About Us</li>
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

    <!--- HEADER IMAGE --->
    <div class="header-image">
      <img src="img/website/slide-image-1v2.jpg" alt="slide-img">
      <div class="scroll-down">
        <i class="fa fa-arrow-down"></i>
      </div>
    </div>


    <!--- HEADER END --->

    <!--- NAVIGATION CONTENT--->
    <div class="navigation-content">
      <div class="main-navigation">
        <div class="navigation">
          <ul>
            <li class="nav active"><a href="home">Home</a></li>
            <li class="nav">About Us</li>
            <div class="dropdown">
              <li class="nav">Destinations<i class="fa fa-caret-down"></i></li>
              <div class="dropdown-content">
                <ul>
                  <li>Tansania</li>
                  <li>New York</li>
                  <li>Rio de Janeiro</li>
                </ul>
              </div>
            </div>
            <li class="nav">What to pack</li>
            <li class="nav"><a href="gallery">Gallery</a></li>
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
      <div class="anchor-navigation">
        <ul>
          <li class="anchor"><a href="#destinations-anchor">Recent destinations and posts</a></li>
          <li class="anchor"><a href="#about-author-anchor">This is me</a></li>
          <li class="anchor"><a href="#slideshow-anchor">Upcoming travels</a></li>
        </ul>
      </div>
    </div>

    <!--- MAIN CONTENT START --->

    <div class="main-content">

      <!--- DESTINATIONS CONTENT --->

      <div class="destinations" id="destinations-anchor">
        <h2>Recent destinations and posts</h2>
        <div class="destination-posts">
          <div class="destination-1">
            <img src="img/website/tanzania_index.jpg" alt="tanzania-pic">
            <h3 class="destination-headline">Tanzania</h3>
            <p class="destination-text">Here comes a short description text about the trip to Tanzania.
              From here the text goes on... Lorem ipsum Lorem ipsum Lorem impsum
              Lorem ipsum.</p>
            <button class="read-btn" type="button" name="button">Read more</button>
          </div>
          <div class="destination-2">
            <img src="img/website/new-york_index.jpg" alt="new-york-pic">
            <h3 class="destination-headline">New York</h3>
            <p class="destination-text">Here comes a short description text about the trip to New York.
              From here the text goes on... Lorem ipsum Lorem ipsum Lorem impsum
              Lorem ipsum.</p>
            <button class="read-btn" type="button" name="button">Read more</button>
          </div>
          <div class="destination-3">
            <img src="img/website/rio-de-janeiro_index.jpg" alt="rio-de-janeiro-pic">
            <h3 class="destination-headline">Rio de Janeiro (Brazil)</h3>
            <p class="destination-text">Here comes a short description text about the trip to Rio de Janeiro.
              From here the text goes on... Lorem ipsum Lorem ipsum Lorem impsum
              Lorem ipsum.</p>
            <button class="read-btn" type="button" name="button">Read more</button>
          </div>
        </div>
      </div>


      <!--- ABOUT AUTHOR CONTENT --->

      <div class="about-author" id="about-author-anchor">
        <h2>This is us</h2>
        <div class="about-author-text">
          <p>Here comes a short text about the autor.
            Lorem Ipsum is simply dummy text of the printing
            and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s,
            when an unknown printer took a galley of type and
            scrambled it to make a type specimen book.
            It has survived not only five centuries, but also the
            leap into electronic typesetting, remaining essentially
            unchanged. It was popularised in the 1960s with the release
            of Letraset sheets containing Lorem Ipsum passages, and more
            recently with desktop publishing software like Aldus PageMaker
            including versions of Lorem Ipsum.</p>
        </div>
      </div>

      <!--- UPCOMING TRAVELS SLIDESHOW CONTENT --->

      <div class="travels-slideshow" id="slideshow-anchor">
        <h2>Upcoming travels</h2>
        <div class="upcoming-travels-images">
          <img class="image active" src="img/website/machu-picchu.jpg" alt="machu-picchu" data-caption="Hiking in Machu Picchu (Peru)">
          <img class="image" src="img/website/yoga-bali.jpg" alt="yoga" data-caption="Getting to know yoga in Bali (Indonesia)">
          <img class="image" src="img/website/stockholm.jpg" alt="stockholm" data-caption="Long weekend in Stockholm (Sweden)">

          <div class="travels-slideshow-caption">
            <h2></h2>
          </div>

          <div class="slideshow-controls">
            <button type="button" name="button-left" class="travel slide-left">
              <i class="fa fa-angle-left"></i></button>
            <button type="button" name="button-right" class="travel slide-right">
              <i class="fa fa-angle-right"></i></button>
          </div>
        </div>

        <div class="dot-container"></div>

      </div>
    </div>


    <!--- MAIN CONTENT END --->

    <!--- FOOTER START --->

    <div class="footer">
      <div class="footer-content">
        <div class="copyright">
          <p>Copyright 2020. All rights reserved</p>
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

    <!--- FOOTER END --->

  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <script src="js/navigation.js" charset="utf-8"></script>
  <script src="js/backtotop.js" charset="utf-8"></script>
  <script src="js/anchornavigation.js" charset="utf-8"></script>
  <script src="js/slideshow.js" charset="utf-8"></script>

</body>

</html>
