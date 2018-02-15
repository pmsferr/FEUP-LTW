<?php
  //stars the session and database connection
  include_once('includes/init.php');
  //html head with title, charset, icon, etc...
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
          <form action="action_login.php" method="post">
            <p id="failed_login"><?= $_SESSION[login_message];?> </p>

            <input type="text" name="username" placeholder="User Name" required>
            <br>

            <input type="password" name="password" placeholder="Password" required>
            <br>

            <input type="submit" value="Log In!">

          </form>
        </div>
      </div>
   </body>
</html>
