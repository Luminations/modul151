<?php
if(isset($_POST) && !empty($_POST)){
	switch(array_keys($_POST)[0]){
		case "user":
			include("db.php");
			$MySql->connectionOpen();
			$MySql->login($_POST["user"]["username"], $_POST["user"]["password"]);
			break;
		default:
			echo "nooooo";
			break;
	}
}
?>