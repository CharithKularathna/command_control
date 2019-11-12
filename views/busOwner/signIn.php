<!-- Header -->
<header class="w3-container w3-light-grey w3-center" style="padding:128px 16px; background-image:url(assets/img/main3.jpg); background-position: top; background-repeat: no-repeat; background-attachment: fixed;" >
  <h1 class="w3-margin w3-jumbo" style="color: white" >TransMax</h1> 
  <p class="w3-xlarge" style="color: white">With you for easy and convenient travel</p>
  <a class="w3-button w3-black w3-padding-large w3-large w3-margin-top" href="<?php echo ROOT_URL; ?>passenger/signin" >I am a Passenger</a>
  <a class="w3-button w3-black w3-padding-large w3-large w3-margin-top" href="<?php echo ROOT_URL; ?>busowner/signin">I am a Bus Owner</a>
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1>Pay the exact Price</h1>
      <h5 class="w3-padding-32" style="align-content: flex-start" >Creating a TransMax account allows you to pay bus fees without worrying about change using our TransMax Payment Card.</h5>

    </div>

    <div class="w3-third w3-center">
      <img src="assets/img/buslogo.jpg" height="300px" width="300px"></i>
    </div>
  </div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-third w3-center">
      <img src="assets/img/schedule.png" height="300px" width="300px"></i>
    </div>

    <div class="w3-twothird">
      <h1>Know the Bus Schedule</h1>
      <h5 class="w3-padding-32">TransMax allows you to check the bus schedule of your travel route and check the availability of Buses using your mobile.</h5>

    </div>
  </div>
</div>


<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity">  
  <div class="w3-xlarge w3-padding-32">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
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

<div>
  <form class="form" action="<?php $_SERVER['PHP_SELF']; ?>" method='post'>
    <h2 id="signinTitle">Sign in</h2>
    <?php
      Messages::display();
    ?>
    <hr>
    <label class="formNames">
      <h5>Email</h5>
    <input type="text" name="email" placeholder="Enter Email" required>
    </label>
    <label class="formNames">
      <h5>Password</h5>
    <input type="password" name="password" placeholder="Enter Password" required>
    </label>
    <br>
    <br>
    <input type="submit" class="submit-button" name='submit' value="Submit">
    &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;Don't have an Account? &nbsp; &nbsp;   
    <a class="create-acc-button" href="<?php echo ROOT_URL; ?>busowner/register"> Create an Account</button>
  </form>
  
</div>
