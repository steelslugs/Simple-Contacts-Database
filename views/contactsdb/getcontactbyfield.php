<h2><?php echo $title; ?></h2>

<?php echo form_open('Contact_controller/viewit/showcontact'); ?>

    <div>Field:
	<?php
	echo '<select name="searchby" id="searchby">';
	echo '	<option value="contact_id">contact_id</option>';
	echo '	<option value="last_name">last_name</option>';
	echo '	<option value="first_name">first_name</option>';
	

	echo '</select>';
	?></div></br>

    <div>Search: 
	<input type="input" name="field" /></div><br />  

    <input class="secondary button" type="submit" name="submit" value="show contact" />

</form>




