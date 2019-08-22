<?php
require("template.php");
require("conn.php");
$_SESSION["isLoggedin"] = false;
?>
<!--   -->

<header class="w3-container w3-blue w3-center" style="padding:108px 12px">
  <div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">

<div class="well">
<ul class="nav nav-tabs">
<li class="active"><a href="#login" data-toggle="tab">Login</a></li>
<li><a href="#create" data-toggle="tab">Create Account</a></li>
</ul>
<div id="myTabContent" class="tab-content">
<div class="tab-pane active in" id="login">
<!--Login form-->   
<br/>
<form action="#" method="POST">
<div class="form-group">
<font color="black"><label for="email">Username:</label></font>
<input type="text" class="form-control" id="email" name="email">
</div>
<div class="form-group">
<font color="black"><label for="pwd">Password:</label></font>
<input type="password" class="form-control" id="pwd" name="pwd">
<input type="hidden" name="type" value="login" />
</div>
<button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$type = $_POST['type'];
	if($type=='login'){
		
		$username = $_POST['email'];
		$password = $_POST['pwd'];
		$encrypt= ($password);
		
		$sql = 'SELECT TherapistId,UserName FROM Therapist WHERE UserName = ? and Password = ? limit 1';
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ss",$username,$encrypt);
		
		$stmt->execute();
		//fetching result would go here, but will be covered later
		
		$output = 'login error';
		$stmt->bind_result($therapistid,$username);
		$stmt->store_result();
		
		if($stmt->num_rows == 1) {
		
			while ($stmt->fetch()) {
				$_SESSION["isLoggedin"] = true;
				$_SESSION["therapistID"] = $therapistid;
				$_SESSION["username"] = $username;
			}
		
			$output = 'logged in';
			
			header("Location: index.php");
		
			
		}
		
		else{
			echo $output;
		}
		
		
		$stmt->close();
	}
	else{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$password1 = ($_POST['password1']);
		$exercises = $_POST['exercises'];
		$last_id = 0;
		
		$sql = "INSERT INTO Therapist (FirstName,LastName,Phone,Email,UserName,Password)
VALUES ('{$fname}', '{$lname}', {$phone},'{$email}','{$email}','{$password1}')";
		
		if ($conn->query($sql) === TRUE) {
			$last_id = $conn->insert_id;
			echo "User created successfully.";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$execstmt = $conn->prepare("INSERT INTO Conducts (TherapistId,ExerciseNumber) VALUES (?,?)");
		foreach ($exercises as $exec) {
			$exec = (int)$exec;
			$execstmt->bind_param("ii",$last_id,$exec);
			$execstmt->execute();
		}
		$execstmt->close();
		$conn->close();
	}
	
}

?>

<div class="tab-pane fade" id="create">
<form action="#" method="post">
<div class="form-group">
<label for=""><font color="black">First Name:</font></label>
<input type="text" class="form-control" id="fname" name="fname">
</div>
<div class="form-group">
<font color="black"><label for="email">Last Name:</label></font>
<input type="text" class="form-control" id="lname" name="lname">
</div>
<div class="form-group">
<font color="black"><label for="email">Phone:</label></font>
<input type="text" class="form-control" id="phone" name="phone">
</div>
<div class="form-group">
<font color="black"><label for="email">E-Mail:</label></font>
<input type="text" class="form-control" id="email" name="email">
</div>

<div class="form-group">
<font color="black"><label for="email">Password:</label></font>
<input type="password" class="form-control" id="password1" name="password1">
</div>

<div class="form-group">
<font color="black"><label for="email">Confirm Password:</label></font>
<input type="password" class="form-control" id="password2" name="password2" >
<input type="hidden" name="type" value="register" />
</div>


<div class="form-group">
<font color="black"><label for="email">Exercises:</label></font>
<br/>

<select class="exercises_cls form-control " name="exercises[]" multiple="multiple">
  <option value="1">Knee</option>
  <option value="2">Shoulder</option>
  <option value="3">Gluteous Maximi</option>
  <option value="4">Biceps</option>
  <option value="5">Triceps</option>
  <option value="6">Erector Spinae</option>
  <option value="7">Hamstring</option>
  <option value="8">Big Toe</option>
</select>
</div>


<button type="submit" class="btn btn-primary">Register</button>
</form>
</div>
</div>
</div>












</div>
<div class="col-md-4"></div>

</div>
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-54 w3-container">
  <div class="w3-content">
    <div class="w3-third w3-center">
      <i class="fa fa-coffee w3-padding-64 w3-text-red w3-margin-right"></i>
    </div>

    <div class="w3-twothird">
      <h2>Structure without function is a corpse.</h2>
      <h5 class="w3-padding-32">Strength training is co-ordination training against resistance.</h5>

      <p class="w3-text-grey">* The body takes the path of least resistance.<br>
* What we do is familiar but not always what is right.<br>
* You are what you train.<br>
* You can’t strengthen a muscle to make it move right. You need to teach it how to move.</p>
    </div>
  </div>
</div>

<div class="w3-container w3-black w3-center w3-opacity w3-padding-32">
    <h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-center w3-opacity">  
  <div class="w3-xlarge w3-padding-16">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
 </div>
</footer>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>






<!--Static content -->

<script src="js\select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.exercises_cls').select2({ width: '100%' });
});

</script>

</body>
</html>