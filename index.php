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
<html class="no-js"> <!--<![endif]-->
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/normalize.min.css">
    </head>
    <body>
        <div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title">Login</h1>
                <nav>
                    <ul>
                        <li><a href="#">Cards</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Ayy</a></li>
                    </ul>
                </nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">
				<?php if(isset($error) && $error !== ""){echo "<p id='errorMessage'>" . $error . "</p>";} ?>
                <form action="" class="userForm" id="loginForm" method="POST">
					<label class="formLabel" for="un">Username:</label>
                    <input  class="formInput input-wide"type="text" name="username" id="un">
					<label class="formLabel" for="pw">Password:</label>
                    <input class="formInput input-wide" type="password" name="password" id="pw">
					<button class="formInput login" class="formLabel" type="submit" id="submit" name="submit">Submit</button>
					<span>Don't have an account? <a href="register.php">Sign up</a> here!</span>
                </form>

            </div> <!-- #main -->
        </div> <!-- #main-container -->

        <div class="footer-container">
            <footer class="wrapper">
                <h3>© Boetschi, Hamdan, Fraser</h3>
            </footer>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script src="js/script.js"></script>
        <script src="js/simpleHash.js"></script>
        <script src="js/user.js"></script>
    </body>
</html>
