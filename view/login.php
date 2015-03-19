<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../tmp.css" rel="stylesheet">
  <script type="text/javascript" src="../js/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.js"></script>
</head>


<body>

  <?php
  require_once './msgBox.php';
  if(!empty($_GET['info'])){
    ?>
    <script type="text/javascript">
    $("#cause").text("<?php echo $_GET['info']?>");
    $("#suc").modal("toggle");
    </script>
    <?php
  }
  ?>

  <div class="container">

    <form class="form-signin" action="../controller/loginController.php">
      <h2 class="form-signin-heading">Peer Assessments</h2>
      <label for="inputAccount" class="sr-only">Account</label>
      <input type="text" id="inputAccount" class="form-control" placeholder="Account" required="" autofocus="" name="account">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="password">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

  </div>


</body>
</html>
