<?php
    if (!(isset($_SESSION['is_logged_in']))){
        header("Location: ". ROOT_URL);
    }
?>

<title>Dashboard</title>

<?php
  new dashTopNav();
?>

<div class="hello">
  <p>Welcome <?php echo $_SESSION['user']['fname'].'!'; ?></p>

</div>
<?php
  new busOwnerSideNav();
?>
<div class = 'dash-container'>
<?php
  new busScheduleDiv();
  new checkBookingsDiv();
?>
</div>




