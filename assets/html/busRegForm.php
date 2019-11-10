<div style="color:black">
  <form class="form" method="post" action="<?php $_SERVER['PHP_SELF'];?>" style="margin-top:50px">
    <h2 id="signintitle">Bus Registration</h2>
    <?php
      Messages::display();
    ?>
    <hr>
    <label class="formNames">
      <h5>Bus Number (Ex: NA-1234)</h5>
    <input type="text" id='bn-text' name="bn" placeholder="Enter Bus Number" maxlength="8"required>
    </label>
    <label class="formNames">
        <h5>Route Number</h5>
    <input type="radio" name="route" value="EX1-1">EX-1-1<br>
    <input type="radio" name="route" value="EX1">EX-1<br>
    <input type="radio" name="route" value="EX1-2">EX-1-2<br>
    </label>
    <label class="formNames">
        <h5>Bus Type</h5>
        <input type="radio" name="bustype" value="50">50-Seat<br>
        <input type="radio" name="bustype" value="32">32-Seat<br> 
    </label>
    <br>
    <br>
    <input type="submit" name='submit' class="submit-button" value="Submit" style="margin-left:280px;">
