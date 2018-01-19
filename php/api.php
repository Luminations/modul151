<?php
if(isset($_POST) && !empty($_POST)){
	switch(array_keys($_POST)[0]){
		case "user":
			$data = $_POST["user"]["data"];
			include("db.php");
			$MySql->connectionOpen();
			if($_POST["user"]["action"] === "login"){
				$result = $MySql->login($data["username"], $data["password"]);
			} else if($_POST["user"]["action"] === "register"){
				$result = $MySql->register($data["username"], $data["password"]);
			}
			echo $result;
			break;
		default:
			echo "nooooo";
			break;
	}
}
?>