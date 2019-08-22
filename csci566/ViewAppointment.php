<?php
include("template.php");
require("conn.php");
if(isset($_SESSION["isLoggedin"]) && $_SESSION["isLoggedin"]){
	$therapistid = $_SESSION["therapistID"];
	$sql = "SELECT * FROM Appointment WHERE TherapistId = {$therapistid}";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
?>

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">AppointmentNumber</th>
      <th scope="col">PatientName</th>
      <th scope="col">TherapistName</th>
      <th scope="col">AppointmentDate</th>
	  <th scope="col">AppointmentTime</th>
	  <th scope="col">Duration</th>
    </tr>
  </thead>
  <tbody>
<?php
		while($row = $result->fetch_assoc()) {
			$AppointmentNumber= $row['AppointmentNumber'];
			$Duration= $row['Duration'];
			$AppointmentDate= $row['AppointmentDate'];
			$AppointmentTime= $row['AppointmentTime'];
			$PatientId= $row['PatientId'];
			$TherapistId= $row['TherapistId'];
			$sql1 = "SELECT FirstName,LastName FROM Patient WHERE PatientId = {$PatientId}";
			$result1 = $conn->query($sql1);
			if ($result->num_rows > 0) {
		while($row = $result1->fetch_assoc()) {
			$PFirstName= $row['FirstName'];
			$PLastName= $row['LastName'];
		}
		}
		$sql2 = "SELECT FirstName,LastName FROM Therapist WHERE TherapistId = {$therapistid}";
			$result1 = $conn->query($sql2);
			if ($result->num_rows > 0) {
		while($row = $result1->fetch_assoc()) {
			$TFirstName= $row['FirstName'];
			$TLastName= $row['LastName'];
		}
		}
		echo "<tr>
		<th scope='row'>{$AppointmentNumber}</th>
		<td>{$PFirstName}</td>
		<td>{$TFirstName}</td>
		<td>{$AppointmentDate}</td>
		<td>{$AppointmentTime}</td>
		<td>{$Duration}</td>
		</tr>";
		}
		echo "</tbody>
	</table>";
	}
	
}

?>

<?php	
include("footer.html");
?>