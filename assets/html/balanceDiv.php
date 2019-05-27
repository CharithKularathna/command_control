<div class="balance-div">
  <div class="balance-div-main">
    <h3>Account Details</h3>
  </div>
  <img src="http://localhost/transmax.net/assets/img/avatar.png" alt="Avatar">
  <div class="balance-div-main" style="background-color:white">
    <h2><b><?php echo $_SESSION['user']['fname'].' '.$_SESSION['user']['lname']; ?></b></h2>
  </div>
  <div class="balance-div-main">
    <p>Account balance: <span class="balance-div-details"><?php echo 'Rs. '.$array['balance'].'.00'; ?></span></p>
    <p>Last Deposit: <span class="balance-div-details"><?php if (isset($array['lastdeposit'])){ echo $array['lastdeposit']; } else {echo 'None';}?></span></p>
  </div>
</div> 

