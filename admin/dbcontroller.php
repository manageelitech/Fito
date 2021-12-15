<?php
include_once('connection.php');
class DBController {
//	private $host = "localhost";
//	private $user = "psgtesiw_fitohm";
//	private $password = "6SWeq&XZcteF";
//	private $database = "psgtesiw_fitohm";
//	private $conn;


    var $connobj;
    var $conn;
	function __construct() {
		//$this->conn = $this->connectDB();
        $this->connobj = new connClass();
        $this->conn = $this->connobj->conn;
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>