<div>
  <form class="form" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
    <h2 id="signintitle">Create an Account</h2>
    <?php
      Messages::display();
    ?>
    <hr>
    <label class="formNames">
      <h5>First Name</h5>
    <input type="text" name="fname" placeholder="Enter First Name" required>
    </label>
    <label class="formNames">
    <h5>Last Name</h5>
    <input type="text" name="lname" placeholder="Enter Last Name" required>
    </label>
    <label class="formNames">
    <h5>Address</h5>
    <input type="text" name="address" placeholder="Enter Address" required>
    </label>
    <label class="formNames">
    <h5>E-mail</h5>
    <input type="email" name="email" placeholder="Enter Email" required>
    </label>
    <label class="formNames">
    <h5>Password</h5>
    <div id="password-comment1"></div>
    <div id="password-comment2"></div>

    <input type="password" name="password" id="password-text" placeholder="Enter Password" required>
    </label>
    <label class="formNames">
    <h5>Confirm Password</h5>
    
    <div id="conpassword-comment"></div>
    <input type="password" name="conpassword" id="conpassword-text" placeholder="Enter Password" required>
    </label>
    <label class="formNames">
    <h5>NIC Number</h5>
    <input type="text" name="nic" placeholder="Enter NIC No." required>
    </label>
    <label class="formNames">
    <h5>Contact Number</h5>
    <input type="text" name="contact" placeholder="Enter Contact No." required>
    </label>
    <input type="checkbox" required id="agree">
    <label>I agree to the terms and conditions of TransMax (Pvt) Ltd.</label>
    <br>
    <br>
    <input type="submit" name='submit' class="submit-button" value="Submit" style="margin-left:280px;">
  </form>
  
</div>
<script src="http://localhost/transmax.net/assets/js/createAcc.js"></script>
