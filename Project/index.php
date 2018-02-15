<?php
  //stars the session and database connection
  include_once('includes/init.php');

  //if the session is set redirects the user to home.php
  if(isset($_SESSION['user'])){
    header("location:home.php");
    die;
  }

  //html head with title, charset, icon, etc...
  include_once('includes/common/html_head.php');
?>

  <body>
    <div class="grid">

      <div class="logo">
        <img id="logo" src="images/checklogo.png" alt="checklist icon">
      </div>

      <div class="titulo">
        <h1 id="titulo">Done!</h1>
      </div>

      <div class="subtitulo">
        <h2 id="subt">Yesterday you said tomorrow. Just do it!</h2>
      </div>

      <div class="signup">
        <a class="butao" href="signup.php">Sign Up</a>
      </div>

      <div class="login">
        <a class="butao" href="login.php">Log In </a>
      </div>

    </div>

  </body>
</html>
