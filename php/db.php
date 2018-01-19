<?php
$MySql = new Sql();
Class Sql{
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "modul151";
	private $connection = "";

    //open connection
    public function connectionOpen(){
      $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database);
    }

    //close connection
    public function connectionClose(){
      $this->connection->close();
    }
  
	//Login function
	public function login($username, $password){
		$escapeString = [$username, $password];
		$data = $this->escapeString($escapeString);
		if($this->getHashMethods("sha512")){
			ini_set('session.hash_function', 'sha512');
			$data[1] = hash("sha512", $data[1]);
			$result = $this->connection->query("SELECT idUser FROM user WHERE Name = '" . $data[0] ."' AND Password = '" . $data[1] . "';");
		}
		if(isset($result) && $result->num_rows > 0){
			$this->setSession("login", $result->fetch_assoc()["idUser"]);
			$return = 1;
		} else {
			//If there where no matches at all the final variable gets set to 0
			$return = 0;
		}
		//Hand the result over to the setSession function
		return $return;
	}
	
	public function register($username, $password){
		//safe parameters into array for later use
		$escapeString = [$username, $password];
		//Hand over user input into escape function [Line: ]
		$data = $this->escapeString($escapeString);
		//Use escaped user input to check if the entered input matches any entry in the database
		$occupied = $this->connection->query("SELECT idUser FROM user WHERE Name = '" . $data[0] ."';");
		if($occupied->num_rows > 0){
			
		} else {
			$data[1] = hash("sha512", $data[1]);
			$succ = $this->connection->query("INSERT INTO user(Name, Password, Money) VALUES ('" . $data[0] . "', '" . $data[1] . "', 1000)");
		}
		if($succ){
			$result = $this->connection->query("SELECT idUser FROM user WHERE Name = '" . $data[0] ."';");
			$this->setSession("login", $result->fetch_assoc()["idUser"]);
			$return = 1;
		} else{
			$return = 0;
		}
		return $return;
	}
	
	//Function for escaping user input	
	private function escapeString($toBeEscaped){
		//Use the array we created earlyer to iterate through variable ammounts of user input
		foreach($toBeEscaped as $escape){
			$escape = $this->connection->real_escape_string($escape);
		}
		//Hand escaped input back to the function
		return $toBeEscaped;
	}
	
	//If a parameter is given it checks if there's a matching hash method.
	//If no parameter is given it returns all usable hashing methods on the server.
	private function getHashMethods($hasingMethod = NULL){
		$returnValue = "";
		if($hasingMethod === NULL){
			$returnValue = hash_algos();
		}else{
			$availableAlgorithms = hash_algos();
			if(array_search($hasingMethod, $availableAlgorithms)){
				$returnValue = true;
			} else {
				$returnValue = false;
			}
		}
		return $returnValue;
	}
	
	//Here all the sessions get set.
	private function setSession($session, $value){
		$_SESSION[$session] = $value;
	}
}
?>