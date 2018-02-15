<?php
  include_once('includes/init.php');

    if(!isset($_SESSION['user'])){
      header("location:home.php");
      die;
    }

  $stmt = $dbh->prepare('SELECT * FROM user WHERE user_username = ? ');
  $stmt->execute(array($_SESSION['user']));
  $result = $stmt->fetch();
  include_once('includes/common/html_head_inside.php');
?>

    <body>
      <header>
        <div class = "headerhome">
          <div class ="logohome">
            <a id="logohome" href="home.php"><img id="logoheader" src="images/checklogo.png" alt="checklist icon" ></a>
            <h1 id="titulohome">Done!</h1>
            <h2 id="subthome">Yesterday you said tomorrow. Just do it!</h2>
          </div>
        </div>
      </header>
      <br>
      <br>
      <form action="action_editProfile.php" method="post" enctype="multipart/form-data">

          <p>The fields you input will be changed, if you wish to keep the old values just leave that field empty.</p>
          <p id="failed_login"><?= $_SESSION['edit_profile_message']; ?></p>
          <label><b>Full Name</b></label>
          <input type="text" name="fullname" placeholder="<?=$result[user_fullName];?>">
          <br>

          <label><b>Birthday</b></label>
          <input type="date" name="birthday" max=
          <?php
            echo date('Y-m-d');
            ?>>
          <br>

          <label><b>New Password</b></label>
          <input type="password" name="passwordedit" >
          <br>

          <label><b>Confirm New Password</b></label>
          <input type="password" name="confirmpasswordedit" >
          <br>

          <label><b>Upload new profile picture</b></label>
          <input type="file" name="profilepic" accept="image/*">
          <br>



            <input type="submit" value="Make change!">
            <input type="reset">

      </form>


      <footer>

      </footer>
   </body>
</html>
