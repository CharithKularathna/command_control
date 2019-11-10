<div style="color:black">
  <form class="form" method="post" action="<?php $_SERVER['PHP_SELF'];?>" style="margin-top:50px">
    <h2 id="signintitle">Time Configuration</h2>
    <?php
      Messages::display();
    ?>
    <hr>
    <label class="formNames">
      <h5>From <?php echo $_COOKIE['start']; ?></h5>
    <input type="time" id='time1' name="time1" required>
    </label>
    <label class="formNames">
      <h5>From <?php echo $_COOKIE['destination']; ?></h5>
    <input type="time" id='time2' name="time2" required>
    </label>
   
    <br>
    <br>
    <input type="submit" name='submit' class="submit-button" value="Submit" style="margin-left:280px;">