<?php
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $username = $_POST["username"];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["repeatpwd"];

  require_once 'database.inc.php';
  require_once 'functions.inc.php';

  if(emtpyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){
    header("location: ../signup.php?error=emptyinput");
    exit();
  }
  if(invalidUsername($username) !== false){
    header("location: ../signup.php?error=invalidusername");
    exit();
  }
  if(invalidEmail($email) !== false){
    header("location: ../signup.php?error=invalidemail");
    exit();
  }
  if(pwdMatch($pwd, $pwdRepeat) !== false){
    header("location: ../signup.php?error=passworddontmatch");
    exit();
  }
  if(usernameExists($conn, $username, $email) !== false){
    header("location: ../signup.php?error=usernametaken");
    exit();
  }

  createUser($conn, $name, $email, $username, $pwd);

}
else{
  header("location: ../signup.php");
  exit();
}
