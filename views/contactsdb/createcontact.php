<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('Contact_controller/createcontact','onsubmit="return validate(\'first_name\');"'); ?>

	<label for="salutation">salutation</label><input type="input"id="salutation" name="salutation" value=""/><span id='1'></span></br>
	<label for="first_name">first_name</label><input type="input" id="first_name"name="first_name" value=""/><span id='2'></span></br>
	<label for="middle_name">middle_name</label><input type="input" id="middle_name"name="middle_name" value=""/><span id='3'></span></br>
	<label for="last_name">last_name</label><input type="input" id="last_name"name="last_name" value=""/><span id='4'></span></br>
	<label for="DOB">DOB</label><input type="input" id="DOB"name="DOB" value=""/><span id='5'></span></br>
	<label for="address">address</label><input type="input" id="address"name="address" value=""/><span id='6'></span></br>
	<label for="city">city</label><input type="input" id="city" name="city" value=""/><span id='7'></span></br>
	<label for="postcode">postcode</label><input type="input" id="postcode"name="postcode" value=""/><span id='8'></span></br>
	<label for="tel">tel</label><input type="input" id="tel"name="tel" value=""/><span id='9'></span></br>
	<label for="email">email</label><input type="input" id="email"name="email" value=""/><span id='10'></span></br>

	<input class="secondary button" type="submit" name="submit" value="Create contact" />

</form>