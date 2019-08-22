

<?php
include("template.php"); // Template file contains header template
require("conn.php"); // connection file
//Check  if session is active or not
if(isset($_SESSION["isLoggedin"]) && $_SESSION["isLoggedin"]){
?>
<header class="w3-container w3-blue w3-center" style="padding:108px 12px">
<div class ="well" style="width:50%;     margin-left: 400px;">
<form action="#" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <font color="black"><label for="FirstName">First Name</label></font>
      <input type="text" class="form-control" id="FirstName" name="firstName" placeholder="Enter FirstName">
    </div>
    <div class="form-group col-md-6">
      <font color="black"><label for="LastName">Last Name</label></font>
      <input type="text" class="form-control" id="LastName" name="lastName" placeholder=" Enter LastName">
    </div>
  </div>
  <div class="form-row">
   <div class="form-group col-md-4">
      <font color="black"><label for="phone">Phone Number</label></font>
      <input type="text" class="form-control" id="Phone" name="phone" placeholder=" Enter PhoneNumber">
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
      <input type="date" class="form-control" id="DateOfBirth" name="dateOfBirth"  name="DateOfBirth" >
    </div>
	</div>
	<div class="form-row">
  <div class="form-group">
    <font color="black"><label for="inputAddress">Address</label></font>
    <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="1234 Main St">
  </div>
</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <font color="black"><label for="inputCity">City</label></font>
      <input type="text" class="form-control" id="inputCity" name="inputCity">
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
      <input type="text" class="form-control" name="inputZip" id="inputZip">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
</form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$fname = $_POST['firstName'];
		$lname = $_POST['lastName'];
		$phone = $_POST['phone'];
		$sex = $_POST['sex'];
		$dateOfBirth = $_POST['dateOfBirth'];
		$inputAddress = ($_POST['inputAddress']);
		$inputCity = $_POST['inputCity'];
		$inputState = $_POST['inputState'];
		$inputZip = $_POST['inputZip'];
		$sql = ("INSERT INTO Patient (FirstName,LastName,Sex,Phone,DateOfBirth,Address,City,State,Zip) VALUES ('{$fname}','{$lname}','{$sex}',{$phone},'{$dateOfBirth}','{$inputAddress}','{$inputCity}','{$inputState}','{$inputZip}')");
		if ($conn->query($sql) === TRUE) {
			$last_id = $conn->insert_id;
			echo "User created successfully.";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
	}	
 ?>
<!--Static content -->
  </body>
</html>


<?php
}
else{
	
	header("Location: login.php");
}
  ?>
 </header> 
<?php	
include("footer.html");
?>