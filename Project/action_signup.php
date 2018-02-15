<?php

  include_once('includes/init.php');

  $_SESSION['signup_message']='';

  $stmt = $dbh->prepare('SELECT user_username FROM user');
  $stmt->execute();
  $usrnames = $stmt->fetchAll();

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    foreach($usrnames as $usrname){
      if($usrname['user_username'] == $_POST['username']){
        $_SESSION['signup_message'] = "That user name is already in use, please try again!";
        header("location: {$_SERVER['HTTP_REFERER']}");
        die;
      }
    }

    if($_POST['username']==''){
      $_SESSION['signup_message'] = "Your username cannot be empty!";
      header("location: {$_SERVER['HTTP_REFERER']}");
      die;
    }

    if($_POST['password']==''){
      $_SESSION['signup_message'] = "Your password cannot be empty!";
      header("location: {$_SERVER['HTTP_REFERER']}");
      die;
    }

    if($_POST['password'] == $_POST['confirmpassword']){
      $user = $_POST['username'];
      $name = $_POST['fullname'];
      $bday = $_POST['birthday'];
      $gender = $_POST['gender'];
      $password = md5($_POST['password']);
      $pic_path = 'images/profile/default-user.png';
      //make sure type file is image
      if(preg_match("!image!",$_FILES['profilepic']['type'])){
        $pic_path = 'images/profile/'.$_FILES['profilepic']['name'];
        copy($_FILES['profilepic']['tmp_name'], $pic_path);
      }
      $_SESSION['user'] = $user;
      $_SESSION['pic'] = $pic_path;
      // Insert user
      $stmt = $dbh->prepare("INSERT INTO user VALUES (?,?,?,?,?,?,?)");
      $stmt->execute(array(NULL, $user, $name, $bday, $pic_path, $gender, $password));
      $_SESSION['message'] = "Registration succesfull! Added $user to the database!";
      header("location: home.php");
    } else{
      $_SESSION['signup_message'] = "Tow passwords did not match!";
      header("location: {$_SERVER['HTTP_REFERER']}");
    }

  }else{
    $_SESSION['signup_message'] = "UPS! Something went wrong, please try again!";
    header("location: {$_SERVER['HTTP_REFERER']}");
    die;
  }

?>
