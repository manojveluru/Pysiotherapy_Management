<?php
include("template.php"); // Template file contains header template
require("conn.php");  // connection file
//Check  if session is active or not
if(isset($_SESSION["isLoggedin"]) && $_SESSION["isLoggedin"]){
	$therapistid = $_SESSION["therapistID"];
?>
<header class="w3-container w3-blue w3-center" style="padding:108px 12px">

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
	
	
	
	<div class="well">
	<form action="#" method="post">
	<div class="form-group">
	<font color="black"><label for="email">Patient:</label></font>
	
	<select class="form-control" id="patient" name="patient">
		<option value="" disabled selected>Select Patient</option>
	<?php 
	$sql = 'SELECT PatientId,FirstName,LastName FROM Patient';
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		
		while($row = $result->fetch_assoc()) {
			//echo "id: " . $row["PatientId"]. " - Name: " . $row["FirstName"]. " " . $row["LastName"]. "<br>";
			echo "<option value='{$row['PatientId']}'>{$row['FirstName']} {$row['LastName']}</option>";
		}
	}
	
	
	
	?>

	</select>
	
	</div>


<?php
}


	if(isset($_SESSION["isLoggedin"]) && $_SESSION["isLoggedin"] && isset($_GET["pid"])){
	$therapistid = $_SESSION["therapistID"];
	$sql = "select c.WeightOfElasticBand,c.ColorElasticBand,c.Reps,d.Bodypart from (select a.PatientId,b.ExerciseNumber,b.WeightOfElasticBand,b.ColorElasticBand,b.Reps from Appointment a join Activity b on a.AppointmentNumber=b.AppointmentNumber) c join Exercises d on c.ExerciseNumber = d.ExerciseNumber where c.PatientId={$_GET["pid"]}";
	$result = $conn->query($sql);
	
	
?>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col"><font color="black">Bodypart</font></th>
      <th scope="col"><font color="black">Weight</font></th>
      <th scope="col"><font color="black">Color of ElasticBand</font></th>
      <th scope="col"><font color="black">Reps</font></th>
    </tr>
  </thead>
  <tbody>
  
 <style>
table, th, td {
    
	color : black;
}
</style>
<?php
		
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			$WeightOfElasticBand= $row['WeightOfElasticBand'];
			$ColorElasticBand= $row['ColorElasticBand'];
			$Reps= $row['Reps'];
			$Bodypart= $row['Bodypart'];
			echo "<td>{$Bodypart}</td><td>{$WeightOfElasticBand}</td><td>{$ColorElasticBand}</td><td>{$Reps}</td>";
			echo "</tr>";
		}
		
		
		
		
		}
		echo "</tbody>
	</table>";
	}

	
?>

</header>
<script>
$(document).ready(function(){
	$('#patient').on('change',function(){
		console.log((window.location.hostname) + window.location.pathname + "?pid="+$(this).val());
		window.location.href = window.location.pathname + "?pid="+$(this).val();
	});
	
});


</script>

<?php
include("footer.html");
?>