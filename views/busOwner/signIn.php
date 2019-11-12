
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
