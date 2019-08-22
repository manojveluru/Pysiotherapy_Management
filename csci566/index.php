
<body>
<?php
//include("temp.html");
include("template.php");
if(isset($_SESSION["isLoggedin"]) && $_SESSION["isLoggedin"]){
	//echo "{$_SESSION["isLoggedin"]},{$_SESSION["therapistID"]}";
}
else{
	echo "<marquee> Click on Login </marquee>";
}
   
?>

<!-- Header -->
<header class="w3-container w3-blue w3-center" style="padding:108px 12px">
  <h1 class="w3-margin w3-jumbo">MOI Physiotherapy</h1>
  <p class="w3-xlarge">Health Is Wealth</p>
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
  </body>
</html>