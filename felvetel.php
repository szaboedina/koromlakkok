<!DOCTYPE html>

<html>

<head>

	<title>Körömlakkok</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		input[type=text], select,input[type=number], input[type=submit]  {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

		.kozep {
				text-align: center;
				color:grey;
			}
		td{
		  border-collapse: collapse;
		  /*border: 1px solid black;*/
		  text-align: center;
		}

		table {
		  border: 1px solid black;
		  text-align: center;
		}

		form {
			text-align: center;
			padding-top: 20px;
			padding-bottom: 20px;
		}
		div {
			padding-top: 20px;
		}
		body{
			background-color: #F8F9F9;
		}
		h1 {
			text-shadow: 2px 2px 8px #000000;
			color: tomato;
		}
		input{
			align: left;
			width: 100%;
		}
		p{
			text-align: left;
		}
		input[type=submit]{
			background-color:tomato;
		}
	</style>
	<nav class="navbar navbar-expand-sm bg-light justify-content-center">
  <ul class="navbar-nav">
    <li class="nav-item">
          <a class="nav-link" href="kilistazas.php">Körömlakk lista</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="felvetel.php">Körömlakk felvétele</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="kezeles.php">Készlet kezelés</a>
    </li>    
    <li class="nav-item">
      <a class="nav-link" href="arkezeles.php">Körömlakkok árkezelése</a>
    </li>
  </ul>
</nav>

</head>
<body>

<h1 align="center">Körömlakkok</h1>

</body>

</html>

<?php
error_reporting(E_ALL ^ E_NOTICE);


if (isset($_POST["action"]) and $_POST["action"] == "adatfelvetel"){
	$insert = new Adatbazis();
	$insert -> insert();
}

$select = new Adatbazis();
$select->insert();

?>
	<form method="POST">
		<label for="marka">Márka:</label> <br>
		<input type="text" name="input_marka"><br />
		<label for="szin">Szín:</label> <br>
		  <select id="szinselect" name="szinselect">
		    <option value="pink">pink</option>
		    <option value="zold">zold</option>
		    <option value="kek">kek</option>
		    <option value="fekete">fekete</option>
		  </select> <br>
		<label for="ar">Ár:</label> <br>
		<input type="number" name="input_ar"><br />
		<label for="keszleten">Készleten:</label> <br>
		<input type="number" name="input_keszleten"><br />

		<input type="hidden" name="action" value="insert"><br />
		<input type="submit" class='btn btn-primary' value="Felvétel">
	</form>
<?php

class Adatbazis{

	public $servername ="localhost";
	public $username="root";
	public $password="";
	public $dbname="koromlakkok";
	public $sql=NULL;
	public $result=NULL;
	public $row=NULL;
	public $conn=NULL;


	public function __construct(){
		self::connect();
	}

	public function __destruct(){
		self::disconnect();
	}	

	public function connect(){
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		$this->conn->set_charset("utf8");
	}

	public function disconnect(){
		$this->conn->close();
	}


	public function insert(){
			$this->sql="INSERT INTO koromlakk (marka, szin, ar, keszleten) 
					VALUES ('".$_POST["input_marka"]."', 
							'".$_POST['szinselect']."', 
							 ".$_POST["input_ar"].",
							 ".$_POST["input_keszleten"]."

							)";
		$this->result = $this->conn->query($this->sql);		

		
		
		
	}

}

?>
