<?php
include("template.php");
require("conn.php");
if(isset($_SESSION["isLoggedin"]) && $_SESSION["isLoggedin"]){
$therapistid = $_SESSION["therapistID"];
$sql = 'SELECT PatientId,FirstName,LastName FROM Patient';

?>
<header class="w3-container w3-blue w3-center" style="padding:108px 12px">
	<div class="well" style="width:50%;     margin-left: 400px;">
	<font color="black"><h3 align= "center">Update Patient Record</h3></font>
	<form action="#" method="post">
	<div class="form-group col-md-6"">
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
	<input type="hidden" name="cat" value="cat">
	<button type="submit" name="search" class="btn btn-primary">Go</button>
	</form>
	</div>
	<?php
	if (isset($_POST['search'])){
	if ($_POST['cat'] == 'cat')
	{
		$patientId = $_POST['patient'];
		$_SESSION["PID"]=$patientId;
	}
	
	
?>
<div class ="well" style="width:50%;     margin-left: 400px;">
<form action="" method="POST">	
  <div class="form-row">
    <div class="form-group col-md-6">
      <font color="black"><label for="FirstName">First Name</label></font>
      <input type="text" class="form-control" id="FirstName" name="firstName" value="">
    </div>
    <div class="form-group col-md-6">	
      <font color="black"><label for="LastName">Last Name</label></font>
      <input type="text" class="form-control" id="LastName" name="lastName" value="">
    </div>
  </div>
  <div class="form-row">
   <div class="form-group col-md-4">
      <font color="black"><label for="phone">Phone Number</label></font>
      <input type="text" class="form-control" id="Phone" name="phone" value="">
    </div>
	<div class="form-group col-md-4">
      <font color="black"><label for="Sex">Sex</label></font>
 
	  <select name="sex" class="form-control" id="sex">
		<option value=""></option>
		<option value="Male">Male</option>
		<option value="Female">Female</option>
	</select>
    </div>
	<div class="form-group col-md-4">
      <font color="black"><label for="DateOfBirth">Date of Birth</label></font>
      <input type="date" class="form-control" id="DateOfBirth" name="dateOfBirth"  value="" >
    </div>
	</div>						
	<div class="form-row">
  <div class="form-group">
    <font color="black"><label for="inputAddress">Address</label></font>
    <input type="text" class="form-control" id="inputAddress" name="inputAddress" value="">
  </div>
</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <font color="black"><label for="inputCity">City</label></font>
      <input type="text" class="form-control" id="inputCity" name="inputCity" value="">
    </div>
    <div class="form-group col-md-4">
      <font color="black"><label for="inputState">State</label></font>
      <select id="inputState" name="inputState" class="form-control">
        <option selected>Choose...</option>
		<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <font color="black"><label for="inputZip">Zip</label></font>
      <input type="text" class="form-control" name="inputZip" id="inputZip" value="">
    </div>
  </div>		
  <input type="hidden" name="update" value="update">
  <button type="submit" name ="Update"class="btn btn-primary">Update</button>
	<button type="reset" class="btn btn-primary">Clear</button>
</form>
<script>
	<?php
	
	$sql1="Select * from Patient where PatientId='$patientId'";
	foreach($conn->query($sql1) as $row )
		{					
			$PFirstName = $row['FirstName'];			
			$PLastName = $row['LastName'];
			$Sex = $row['Sex'];
			$Phone = $row['Phone'];
			$DateOfBirth = $row['DateOfBirth'];
			$Address = $row['Address'];
			$City = $row['City'];
			$State = $row['State'];
			$Zip = $row['Zip'];
		}
	
	
	
	
	?>
	
	$(document).ready(function(){
		
		var PFirstName="<?=$PFirstName?>";
	var PLastName = "<?=$PLastName?>";
	var Phone = "<?=$Phone?>";
	var DateOfBirth = "<?=$DateOfBirth?>";
	var Address = "<?=$Address?>";
	var City = "<?=$City?>";
	var Zip = "<?=$Zip?>";
	var state = "<?=$State?>";
	var sex = "<?=$Sex?>";
	
	$('#FirstName').val(PFirstName);
	$('#LastName').val(PLastName);
	$('#Phone').val(Phone);
	$('#sex').val(sex);
	$('#DateOfBirth').val(DateOfBirth);
	$('#inputAddress').val(Address);
	$('#inputCity').val(City);
	$('#inputState').val(state);
	$('#inputZip').val(Zip);
	
		
		
		
	});
	
	
	</script>
	
	
	
	<?php
	}
	if (isset($_POST['Update']))
	{  
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$phone = $_POST['phone'];
		$sex = $_POST['sex'];
		$dateOfBirth = $_POST['dateOfBirth'];
		$inputAddress = $_POST['inputAddress'];
		$inputCity = $_POST['inputCity'];
		$inputState = $_POST['inputState'];
		$inputZip = $_POST['inputZip'];
		$pid= $_SESSION["PID"];
	    $sql4 = "UPDATE Patient SET FirstName='{$firstName}', LastName='{$lastName} ', Sex='{$sex}', Phone='{$phone}', DateOfBirth='{$dateOfBirth}',Address='{$inputAddress}',City='{$inputCity}',State='{$inputState}',Zip='{$inputZip}' WHERE PatientId='{$pid}'";
        //$conn->prepare($sql4)->execute([$firstName, $lastName, $sex, $phone,$dateOfBirth,$inputAddress,$inputCity,$inputState,$inputZip,$pid]);
		if ($conn->query($sql4) === TRUE) {
			echo "<h3 align= 'center'>Patient ".$pid." record updated successfully.</h3>";	
		} else {
			echo "Error updating record: " . $conn->error;
}
        
	}

	}
	?>
	</div>
</header>	
<?php	
include("footer.html");
?>