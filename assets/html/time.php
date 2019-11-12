<!DOCTYPE html>
<html>
	<title>Time Table</title>
<head>
	
	<style>
* {
  box-sizing: border-box;
}

#myInput {
 
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 90%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
#mysearch {
  ;
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 9.5%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #dddd;
}

th, td {
  text-align: left;
  padding: 20px;
}
th{
	font-size: 20px;
}

tr:nth-child(even) {
  background-color: #f2f2f2
}
.image{
	background-image: url(../image/ff.jpg);
	width: 1300px;
	height: 250px;
}
</style>
</head>
<body>
	<div class="all">
	<div class="head">
		<h1>Bus Schedule</h1>
		<style >
			h1{
				color: red;
				margin-left: 500px;
			}
		</style>
	</div>   <!-- head -->
	<div class="image">
		
	</div>
		<div class="content">
		<form method="POST" action="time.php">
			<select name="sea" id="myInput" placeholder="Search for Route Name">
						<option></option>
						<option>Maharagama-Matara</option>
						<option>Maharagama-Galle</option>
						<option>Kadawatha-Matara</option>
						<option>Kadawatha-Galle</option>
						<option>Kaduwela-Galle</option>
						<option>Kaduwela-Matara</option>
						<option>Colombo-Katunayake</option>
					</select>
			<input type="submit" name="search" value="Search" id="mysearch"> <br><br>
		</form>

<?php 
if(isset($_POST['search'])){

	$h = $_POST['sea'];


$servername="localhost";
$username="root";
$password="";
$dbname="transmax";

$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection failed: " .$conn->connect_error);
}

$sql= "SELECT * FROM bus_schedule WHERE routename LIKE '%$h%'";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Bus Number</th>";
                echo "<th>Route</th>";
                echo "<th>Route-Name</th>";
                echo "<th>Time</th>";
                echo "<th>Category</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['busnumber'] . "</td>";
                echo "<td>" . $row['route'] . "</td>";
                echo "<td>" . $row['routename'] . "</td>";
                echo "<td>" . $row['timing'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
} else{
	echo "0 results";
}

$conn->close();
}
}
 ?>	
		</div>   <!-- content -->
		
	</div>   <!-- all -->
	
</body>
</html>