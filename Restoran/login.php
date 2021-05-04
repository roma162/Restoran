<?php
  include_once 'header.php'
?>

    <section class="signup-form">
      <br><br><br><br><br><br><h2>Log In</h2><br>
      <div class="signup-form-form">
        <form action="includes/login.inc.php" method="post">
          <input type="text" name="username" placeholder="Username/Email..."><br>
          <input type="password" name="pwd" placeholder="Password..."><br>
          <button type="submit" name="submit">Log In</button>
          <br><br><p>You don't have account?&ensp;<a href="signup.php">Sign up</a></p>
        </form>
      </div>
      <br><br>
      <?php
        if(isset($_GET["error"])){
          if($_GET["error"]=="emptyinput"){
            echo "<p>Fill in all fields!!!</p>";
          }
          else if($_GET["error"]=="wronglogin"){
            echo "<p>Incorrect login!!!</p>";
          }
        }

      ?>
    </section>


<?php
  include_once 'footer.php'
?>
