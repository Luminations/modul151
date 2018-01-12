<?php
Class Sql{
  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  private $database = "modul183";
  private $connection = "";
  private $imageTable = "image";
  private $userTable = "user";


  //
  public function __construct(){
    
  }

  //open connection
  public function connectionOpen(){
    $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database);
  }

  //close connection
  public function connectionClose(){
    $this->connection->close();
  }
}
?>