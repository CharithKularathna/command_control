<title>Dashboard</title>

<?php
    if (!(isset($_SESSION['is_logged_in']))){
        header("Location: ". ROOT_URL);
    }
?>
<body>

<?php
  new dashTopNav();

?>

<div class="hello">
  <p>Welcome <?php echo $_SESSION['user']['fname'].'!'; ?></p>

</div>

<?php
  new passengerSideNav();
?>
<div class = 'dash-container'>
<?php
  new busScheduleDiv();
  new seatBookingsDiv();
?>
</div>



</body>