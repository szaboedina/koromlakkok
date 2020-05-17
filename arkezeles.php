<!DOCTYPE html>
<html>
<head>
	<title>Körömlakkok</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		.kozep {
				text-align: center;
				color:grey;
			}
		td{
		  border-collapse: collapse;
		  /*border: 1px solid black;*/
		  text-align: center;
		  			color: tomato;

		}

		table {
		  border-top: 1px solid black;
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
			border-bottom: 1px #000000;
						color: tomato;

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

if (isset($_POST["action"]) and $_POST["action"] == "ar_noveles"){
	$noveles = new Adatbazis();
	$noveles -> noveles();
}

if (isset($_POST["action"]) and $_POST["action"] == "ar_csokkentes"){
	$csokk = new Adatbazis();
	$csokk -> csokk();
}

$select = new Adatbazis();
$select->select();



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

	public function select(){
		$this->sql="SELECT * FROM koromlakk
					WHERE keszleten = true";

		$this->result = $this->conn->query($this->sql);

		if ($this->result->num_rows >0) {
			?>
			<div class="container">
			<table class="table">

			<?php
			while ($this->row = $this->result->fetch_assoc()) {
				?>
				<tbody>
					<tr>
						<td><?php echo $this->row["marka"]?></td>
						<td><?php echo $this->row["szin"]?></td>
						<td><?php echo $this->row["ar"]."$"?></td>
						<td><?php 
							echo "<form method='POST'>";
								echo "<input type='hidden' name='action' value='ar_noveles'>";
								echo "<input type='hidden' name='input_id' value='". $this->row["id"]."'>";?>
								<input type="submit" class="btn btn-success" value='+'><?php
							echo "</form>";?>
						</td>
						<td><?php 
							echo "<form method='POST'>";
								echo "<input type='hidden' name='action' value='ar_csokkentes'>";
								echo "<input type='hidden' name='input_id' value='". $this->row["id"]."'>";?>
								<input type="submit" class="btn btn-warning" value='-'><?php
							echo "</form>";?>
						</td>						
					</tr>
			<?php
			}
			?>
				</tbody>
			</table>
			</div>
			<?php
		}
		else{
			?><div class="kozep">
				<h1>Nincs eredmény!</h1>
			</div><?php
		}
	}



	public function noveles(){
		

		$this->sql="UPDATE koromlakk SET ar = ar+1
					WHERE id = " . $_POST["input_id"] . ";";

		$this->result = $this->conn->query($this->sql);		

			
	}

	public function csokk(){
		


		$this->sql="UPDATE koromlakk SET ar = ar-1
					WHERE id = " . $_POST["input_id"] . ";";

		$this->result = $this->conn->query($this->sql);	
	
	}



}

?>
