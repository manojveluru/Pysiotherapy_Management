<?php
include("template.php"); //header template
require("conn.php"); //connection file
if(isset($_SESSION["isLoggedin"]) && $_SESSION["isLoggedin"]){
	$therapistid = $_SESSION["therapistID"];
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$patientid = ($_POST['patient']);
		$date1  = ($_POST['date']);
		$time  = ($_POST['time']);
		$duration  = ($_POST['duration']);
		$exercises  = ($_POST['excercises']);
		$reps  = ($_POST['reps']);
		$weights  = ($_POST['weight']);
		$bands = $_POST['band'];
		
		$sql = ("INSERT INTO Appointment (Duration,AppointmentDate,AppointmentTime,PatientId,TherapistId) VALUES ({$duration},'{$date1}','{$time}',{$patientid},{$therapistid})");
		
		
		if ($conn->query($sql) === TRUE) {
			$appnt_id = $conn->insert_id;
			
			for ($i=0;$i<count($exercises);$i++){
			$ex_no = $exercises[$i];
			$weight = $weights[$i];
			$rep = $reps[$i];
			$band = $bands[$i];
			$sql = ("INSERT INTO Activity (WeightOfElasticBand,ColorElasticBand,Reps,AppointmentNumber,ExerciseNumber) VALUES ({$weight},'{$band}','{$rep}',{$appnt_id},{$ex_no})");
			$conn->query($sql);
			}
			
			
			
			
			echo "Appointment - {$appnt_id} scheduled successfully.";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		
		
		
		/*
		
		foreach ($exercises as $exec) {
			echo "{$exec}";
			$exec = (int)$exec;
			$execstmt->bind_param("ii",$last_id,$exec);
			$execstmt->execute();
		}
		$execstmt->close();
		*/
		
	}
	
	
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
	
	
	<div class="form-group"  id="datetime">
	<font color="black"><label for="email">Date - Time:</label></font>
	<div class="" style="
	display:  inline-flex;
">
	<div class="input-group date col-md-4">
	
	<input type="text" name="date" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
	</div>
	
	<div class="col-md-3">
	<select class="form-control" name="time" id="freeslots">
	
	</select>
	</div>
	<div class="col-md-3">
	<select class="form-control" name="duration">
	<option>Duration</option>
	<option>30</option>
	<option>60</option>
	<option>90</option>
	</select>
	</div>
	</div>
	
	</div>
	
	
	
	<div class="form-group">
	
	
	<button class="btn btn-info" type="button" onClick="add_exer_field()" >Add Exercise</button>
	<button class="btn btn-info" type="button" onClick="del_exer_field()" >Delete Exercise</button>
	
	</div>
	
	
	
	<div class="form-group row" id="exercise_details">
	<div id="exer_field_star">
	<span class="col-md-3"><select class="form-control" name="excercises[]"><option value="" disabled selected>Select Exercise</option>
		<?php 
	$sql = "select c.ExerciseNumber,c.TherapistId,e.Bodypart from Conducts c join Exercises e on c.ExerciseNumber = e.ExerciseNumber where c.TherapistId = {$therapistid}";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		
		while($row = $result->fetch_assoc()) {
			//echo "id: " . $row["PatientId"]. " - Name: " . $row["FirstName"]. " " . $row["LastName"]. "<br>";
			echo "<option value='{$row['ExerciseNumber']}'>{$row['Bodypart']}</option>";
		}
	}
	//$conn->close();
	
	
	?>
	
	
	
	</select></span>
	<span class="col-md-3"><input name="reps[]" type="text" class="form-control" placeholder="Reps" /></span>
	<span class="col-md-3"><input name="weight[]" type="text" class="form-control" placeholder="Weight" /></span>
	<span class="col-md-3"><input name="band[]" type="text" class="form-control" placeholder="Band" /></span>
	</div>
	
	
	</div>
	
	
	<button type="submit" class="btn btn-primary">Schedule</button>
	</form>
	</div>
	
	
	
	
	
	</div>
	<div class="col-md-3"></div>

	</div>









	<script src="js\bootstrap-datepicker.min.js"></script>
	<script>
	$(document).ready(function() {
		var date = new Date();
		date.setDate(date.getDate()-1);
		$('#datetime .input-group.date').datepicker({
startDate: date,
daysOfWeekDisabled: [0,6],
format: 'yyyy-mm-dd'
			
		}).on("changeDate", function(e) {
        selected_date = e.date.toISOString().slice(0,10);
		getFreeSlots(selected_date);
    });

		<?php 
			$sql = " select a.AppointmentDate,GROUP_CONCAT(a.AppointmentTime) as timeStr,GROUP_CONCAT(a.Duration) as durationStr from (Select * from Appointment where TherapistId={$therapistid}) a  group by AppointmentDate;";
			
			$myArray = array();
			if ($result = $conn->query($sql)) {

				while($row = $result->fetch_assoc()) {
					$myArray[] = $row;
				}
			
			}
			echo "var app_times = ";
			echo json_encode($myArray);
			echo ";";
		?>
		//console.log(app_times);
		var app_json={};
		
		
		
		
		var free_slots = ["09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00"];
		function arr_diff (a1, a2) {

    var a = [], diff = [];

    for (var i = 0; i < a1.length; i++) {
        a[a1[i]] = true;
    }

    for (var i = 0; i < a2.length; i++) {
        if (a[a2[i]]) {
            delete a[a2[i]];
        } else {
            a[a2[i]] = true;
        }
    }

    for (var k in a) {
        diff.push(k);
    }

    return diff;
}
		
		
		
		
		
		
		app_times.map(function(data){
			cur_date = data["AppointmentDate"];
			duration = data["durationStr"].split(',');
			times = data["timeStr"].split(',');
			slots = [];
			for(var i=0;i<duration.length;i++){
				dateobj = new Date(cur_date +" "+ times[i] );
				d = times[i].split(':');
				slots.push(d[0]+":"+d[1]);
				rs = parseInt(duration[i])/30;
				for(j=0;j<(rs-1);j++){
					dateobj = new Date(dateobj.getTime() + 30*60000);
					slots.push(("0"+dateobj.getHours()).slice(-2)+":"+(dateobj.getMinutes()==0 ? "00":dateobj.getMinutes()));
				}
			}
			app_json[cur_date] = slots;
			
			});
			
			
			function getFreeSlots(dateStr){
				arr2 = (dateStr in app_json ? app_json[dateStr] : []);
				date_free_slots = arr_diff(free_slots,arr2);
//console.log(free_slots);		

		$('#freeslots').html('');
		var options="";
		for (k=0;k<(date_free_slots.length);k++){
			options += "<option value='"+date_free_slots[k]+"'>"+date_free_slots[k]+"</option>";
		}
		$('#freeslots').html(options);
			
			
			}
			
			
		
		
		
		var inp_count = 0;
		var html_content =   $("#exer_field_star").html();
		add_exer_field = function(){
			inp_count++;
			html_content1 = "<div id='row"+inp_count+"'>"+html_content+"</div>"
			$("#exercise_details").append(html_content1);
			
		};
		del_exer_field = function(){
			if(inp_count){
				rowid = "#row"+inp_count;
				$(rowid).remove();
				inp_count--;
			}
		};
	});

	</script>
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

