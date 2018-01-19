<?php
session_start();
include("php/db.php");
if (isset($_POST["username"]) && $_POST["username"] !== "" && isset($_POST["password"]) && $_POST["password"] !== "" && isset($_POST["submit"])) {
    $MySql->login($_POST["username"], $_POST["password"]);
}
if (isset($_SESSION["login"]) && $_SESSION["login"]) {
    header("Location: main.php");
}

if (isset($_SESSION["ERROR"]) AND $_SESSION["ERROR"] !== "") {
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
<body>
<ul>
    <li><!-- Button to open the modal login form -->
        <a href="#home" onclick="document.getElementById('id01').style.display='block'">Login</a></li>
</ul>
<!-- The Modal -->
<div id="id01" class="modal">
    <!-- Modal Content -->
    <form class="modal-content animate" action="/action_page.php">
        <span onclick="document.getElementById('id01').style.display='none'" class="close"
              title="Close Modal">&times;</span>
        <div class="imgcontainer">
            <img src="resources/pictures/octahedron.png"
                 alt="Avatar" class="avatar">
        </div>
        <div class="container">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit">Login</button>
        </div>
        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">
                Cancel
            </button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
