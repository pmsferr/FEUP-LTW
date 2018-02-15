<?php

  include_once('includes/init.php');

  $user = $_POST['username'];
  $password = md5($_POST['password']);

  function isLoginCorrect($user, $password) {
      global $dbh;
      $stmt = $dbh->prepare('SELECT * FROM user WHERE user_username = ? AND user_password = ?');
      $stmt->execute(array($user, md5($password)));
      return $stmt->fetch() !== false;
    }

  if (isLoginCorrect($_POST['username'], $_POST['password'])) {
    $_SESSION['user'] = $user;
  } else {
    $_SESSION['login_message']= "Login Failed!";
    header("location: {$_SERVER['HTTP_REFERER']}");
    die;
  }

  header("location: home.php");

 ?>
