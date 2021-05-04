<?php
  include_once 'header.php'
?>

<div class="box">
  <?php
    if (isset($_SESSION["username"])){
      echo "<h3>" . $_SESSION["username"] . "</h3>";
    }
   ?>
  <img src='images/avatar.png' alt='Avatar' class='avatar2'><br><br><br><br>
  <p>Finished using our site?&ensp;<a href='includes/logout.inc.php'>Log out</a></p>
</div>


<?php
  include_once 'footer.php'
?>
