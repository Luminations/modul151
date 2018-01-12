<?php
if(isset($_POST) && !empty($_POST)){
	switch(array_keys($_POST)[0]){
		case "user":
			echo "ayyyyy";
			break;
		default:
			echo "nooooo";
			break;
	}
}
?>