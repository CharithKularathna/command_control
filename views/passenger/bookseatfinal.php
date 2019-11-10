<html lang="en">
<title>TransMax Offical</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://localhost/transmax.net/assets/css/forms.css">

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-light-grey w3-card w3-left-align w3-large" >
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-blue" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="<?php echo ROOT_URL; ?>" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="http://localhost/transmax.net/assets/html/time.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Bus Schedule</a>
    
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contact Us</a>
    
    <?php
      if (isset($_SESSION['is_logged_in'])) : //Use colon here. Later on use endif
    ?>
      <a href='<?php echo ROOT_URL; ?>home/logout' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>Logout</a>  
    <?php
      endif; ?>
     
  </div>