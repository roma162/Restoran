<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>FERIT</title>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <header style="overflow: auto">
        <div class="main">
            <div class="ime">
              <h1>FERIT</h1>
            </div>
            <div class="myprofile" style="float:right;">
            <?php
              if(isset($_SESSION["username"])){
                echo "<li><a href='profile.php'><img src='images/avatar.png' alt='Avatar' class='avatar'></a></li>";
            }
            ?>
          </div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contact.php">Contact</a></li>

                <?php
                  if(isset($_SESSION["username"])){
                    echo "<li><a href='menu.php'>Order</a></li>";
                  }
                  else{
                    echo "<li><a href='unl_menu.php'>Menu</a></li>";
                    echo "<li><a href='signup.php'>Sign Up</a></li>";
                    echo "<li><a href='login.php'>Sign In</a></li>";
                  }
                ?>
            </ul>

        </div>
    </header>
