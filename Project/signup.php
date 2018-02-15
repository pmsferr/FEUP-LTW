<?php
  //stars the session and database connection
  include_once('includes/init.php');
  //html head with title, charset, icon, scripts, etc...
  include_once('includes/common/html_head.php');
?>
  <body>
    <div class="grid">
      <div class="logo">
        <a href="index.php"><img src="images/checklogo.png" alt="checklist icon"></a>
      </div>

      <div class="titulo">
        <h1 id="titulo">Done!</h1>
      </div>

      <div class="subtitulo">
        <h2 id="subt">Yesterday you said tomorrow. Just do it!</h2>
      </div>

      <div class="form">
        <form action="action_signup.php" method="post" enctype="multipart/form-data">
          <p id="failed_login"><?= $_SESSION[signup_message];?> </p>
          <input type="text" name="username" placeholder="User name*" required>
          <br>
          <input type="text" placeholder="Full Name" name="fullname">
          <br>
          <label>Enter your birthday:</label>
          <input type="date" name="birthday" max=<?=date('Y-m-d');?>>
          <br>
          <div class="sex">
            <label><input type="radio" name="gender" value="male"> Male</label>
            <br>
            <label><input type="radio" name="gender" value="female"> Female</label>
            <br>
            <label><input type="radio" name="gender" value="other"> Other</label>
            <br>
          </div>
          <input type="password" name="password" placeholder="Password*" required>
          <br>
          <input type="password" name="confirmpassword" placeholder="Confirm Password*" required>
          <br>
          <label>Upload your profile picture<input type="file" name="profilepic" accept="image/*"></label>
          <br>
          <input type="submit" value="Sign Up!">
          <input id="reset" type="reset">
        </form>
      </div>
   </body>
</html>
