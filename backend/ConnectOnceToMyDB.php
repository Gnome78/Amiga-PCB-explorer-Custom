<?php

// Singleton de Connection SGBD
class ConnectOnceToMyDB {
 private static $instance = null;
 private $conn;
 private $servername = 'localhost';
 private $username = 'APE_user';
 private $password = 'xxxxxxxxx';	// <--------- NEED TO CHANGE


// Connect to SGBD using private construtor
private function __construct()
  {
	$this->servername = 'localhost';
	$this->username = 'APE_user';
	$this->password = 'xxxxxxxxx';	// <--------- NEED TO CHANGE
	$this->dbname = $GLOBALS['dbname'];
    $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
  }
  
  public static function getInstance()
  {
    if(!self::$instance)
    {
      self::$instance = new ConnectOnceToMyDB();
    }
    return self::$instance;
  }
  
  public function getConnection()
  {
    return $this->conn;
  }
}
?>
