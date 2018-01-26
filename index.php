<?php
session_start();

if(isset($_SESSION["login"]) && $_SESSION["login"]){
	header("Location: main.php");
}

if(isset($_SESSION["ERROR"]) AND $_SESSION["ERROR"] !== ""){
	$error = $_SESSION["ERROR"];
	$_SESSION["ERROR"] = "";
}

?>

<!DOCTYPE html>
<html> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Hoi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/normalize.min.css">
</head>
<body class="bgColor">
  <ul>
      <li>
          <a href="#home" onclick="document.getElementById('id01').style.display='block'">Login</a>
      </li>
  </ul>
  <!-- The Modal -->
  <div id="id01" class="modal">
      <!-- Modal Content -->
      <form class="modal-content animate userForm">
          <span onclick="document.getElementById('id01').style.display='none'" class="close"
                title="Close Modal">&times;</span>
          <div>
              <img src="resources/pictures/octahedron.png" alt="Avatar"/>
          </div>
          <div>
              <label><b>Username</b></label>
              <input type="text" class="login-form-field formInput" placeholder="Enter Username" name="username" required>
              <br>
              <label><b>Password</b></label>
              <input type="password" class="login-form-field formInput" placeholder="Enter Password" name="password" required>
              <br>
              <button type="submit" class="login-form-field formInput login" id="submit">Login</button>
          </div>
          <div class="container bottomColor">
              <span>Don't have an <a href="/register.php">account?</a></span>
          </div>
      </form>
  </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
  <script src="js/script.js"></script>
  <script src="js/simpleHash.js"></script>
  <script src="js/user.js"></script>
</body>
</html>
