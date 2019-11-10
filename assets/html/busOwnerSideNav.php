

<div id="mySidenav" class="sidenav">
  <img src="http://localhost/transmax.net/assets/img/user.png" id='userpic'>

  <p id='username'><?php echo $_SESSION['user']['fname'].' '.$_SESSION['user']['lname']; ?></p>

  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="<?php echo ROOT_URL; ?>busowner/balance">Check Balance</a>
  <a href="<?php echo ROOT_URL; ?>busowner/registerbus">Register a Bus</a>
  <a href="#">Preferences</a>
  <a href="#">Help</a>
</div>
