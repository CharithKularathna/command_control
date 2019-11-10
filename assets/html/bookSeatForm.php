<div style="color:black">
  <form class="form" method="post" action="<?php $_SERVER['PHP_SELF'];?>" style="margin-top:50px">
    <h2 id="signintitle">Seat Booking</h2>
    <?php
      Messages::display();
    ?>
    <hr>
    <label class="formNames">
        <h5>From</h5>
    <select name="start">
        <option value='Kaduwela'>Kaduwela</option>
        <option value='Maharagama'>Maharagama</option>
        <option value='Matara'>Matara</option>
        <option value='Galle'>Galle</option>
    </select>
    </label>

    <label class="formNames">
        <h5>To</h5>
    <select name="destination">
        <option value='Kaduwela'>Kaduwela</option>
        <option value='Maharagama'>Maharagama</option>
        <option value='Matara'>Matara</option>
        <option value='Galle'>Galle</option>
    </select>
    </label>
    <br>
    <br>
    <input type="submit" name='submit' class="submit-button" value="Search" style="margin-left:280px;">
</div>