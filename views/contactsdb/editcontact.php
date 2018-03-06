<h3><?php echo $title; ?></h3>

<?php echo validation_errors(); ?>

<?php echo form_open('Contact_controller/viewit/createcontact','onsubmit="return validate(\'first_name\');"'); ?>
	<div class="grid-x grid-padding-x">
		<div class="large-4 cell">
			<select name="salutation" id="salutation">';
				<option value="Mr">Mr</option>
				<option value="Mrs">Mrs</option>
				<option value="Miss">Miss</option>
				<option value="Dr">Dr</option>
			
			</select>
	
	<!--<label for="salutation">salutation</label><input type="input"id="salutation" name="salutation" value=""/><span id='1'></span></br>
	-->
	
			<label for="first_name">first_name</label><input type="input" id="first_name"name="first_name" value="<?php echo set_value('first_name'); ?>"/><span id='2'></span></br>
			<label for="middle_name">middle_name</label><input type="input" id="middle_name"name="middle_name" value="<?php echo set_value('middle_name'); ?>"/><span id='3'></span></br>
			<label for="last_name">last_name</label><input type="input" id="last_name"name="last_name" value="<?php echo set_value('last_name'); ?>"/><span id='4'></span></br>
			<label for="DOB">DOB</label><input type="date" id="DOB"name="DOB" value="<?php echo set_value('DOB'); ?>"/><span id='5'></span></br>
			<label for="address">address</label><input type="input" id="address"name="address" value="<?php echo set_value('address'); ?>"/><span id='6'></span></br>
			<label for="city">city</label><input type="input" id="city" name="city" value="<?php echo set_value('city'); ?>"/><span id='7'></span></br>
			<label for="postcode">postcode</label><input type="input" id="postcode"name="postcode" value="<?php echo set_value('postcode'); ?>"/><span id='8'></span></br>
			<label for="tel">tel</label><input type="input" id="tel"name="tel" value="<?php echo set_value('tel'); ?>"/><span id='9'></span></br>
			<label for="email">email</label><input type="input" id="email"name="email" value="<?php echo set_value('email'); ?>"/><span id='10'></span></br>
			<label for="passconf">password</label><input type="input" id="passconf"name="passconf" value="<?php echo set_value('passconf'); ?>"/><span id='10'></span></br>		
		</div>
	</div>	
	<input class="secondary button" type="submit" name="submit" value="Create contact" />

</form>

