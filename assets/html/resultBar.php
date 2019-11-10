<h4 style='text-align: center; color: black;'>Search Results<h4>
<hr style='height: 50px'>
<?php 
    $newarray = $model->resultArray;
    if(is_array($newarray)) :
?>

<?php for ($x=0; $x<count($newarray); $x++) : ?>
    <div style='color: black; margin-left: 10%'>
    <h5 style='padding: 2px 16px; background-color: #f1f1f1; width: 80%'>Bus Number: </h5> <p style='padding: 2px 16px; color:black'> <?php echo $newarray[$x]['busnum'];?> </p>
    <h5 style='padding: 2px 16px; background-color: #f1f1f1; width: 80%'>Departure Time: </h5> <p style='padding: 2px 16px; color:black'> <?php echo $newarray[$x]['fromtime'];?> </p>
    <h5 style='padding: 2px 16px; background-color: #f1f1f1; width: 80%'>Bus Type:  </h5> <p style='padding: 2px 16px; color:black'> Luxury 50-Seat </p>
    <h4 style='padding: 2px 16px; background-color: black; color: white; width: 80%'>Price: </h6> <p style='padding: 2px 16px; color:black'>Rs. 790.00 </p>
    
    <form method="post" action="<?php echo ROOT_URL;?>passenger/bookseatfinal">
        <label class="formNames"> ID
            <input type='text' name='busid' style='width: 10%' value='<?php echo $newarray[$x]['id'];?>'>
        </label>
        <br>
    <br>
    <input type="submit" name='submit' class="submit-button" value="Book">
    </form>
    <hr style='height: 50px'>
    </div>

<?php endfor; ?>
<?php endif; ?>