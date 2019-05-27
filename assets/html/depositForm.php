<div style="color:black">
  <form class="form" method="post" action="<?php $_SERVER['PHP_SELF'];?>" style="margin-top:50px">
    <h2 id="signintitle">Deposit to Account</h2>
    <?php
      Messages::display();
    ?>
    <hr>
    <label class="formNames">
      <h5>Credit Card Number</h5>
      <div id="password-comment1"></div>
      <div id="password-comment2"></div>
      <div id="password-comment1"></div>
    <input type="text" id='ccn-text' name="ccn" placeholder="Enter Credit Card Number" maxlength="16"required>
    </label>
    <label class="formNames">
        <h5>CVC</h5>
    <input type="text" name="cvc" placeholder="Enter CVC" maxlength="3" size="3" required>
    </label>
    <label class="formNames">
        <h5>Amount (LKR)</h5>
    <input type="number" name="amount" placeholder="Enter Amount" required>
    </label>
    <br>
    <br>
    <input type="submit" name='submit' class="submit-button" value="Deposit" style="margin-left:280px;">
  </form>
<script src="http://localhost/transmax.net/assets/js/deposit.js"></script>
  