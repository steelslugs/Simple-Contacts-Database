<h2><?php echo $title; ?></h2>
<?php echo validation_errors(); ?>

<?php echo form_open('Contact_controller/updatecontact','');?>
		<?php foreach ($contact as $contacts): ?>
				<div >
					<?php foreach ($contacts as $c_key => $c_value): ?>
						<div class="grid-x grid-padding-x">
							<div class="large-4 cell">
								<?php 
								
								if($c_key==="salutation"){
									echo '<select name="salutation" id="salutation">';
									echo '	<option value="Mr">Mr</option>';
									echo '	<option value="Mrs">Mrs</option>';
									echo '	<option value="Miss">Miss</option>';
									echo '	<option value="Dr">Dr</option>';
									echo '</select>';
								}//condition to remove contact id
								elseif ($c_key === "contact_id"){
									echo '<input  type="hidden" name="'.$c_key.'" value="'.$c_value.'"/></br>';
								}
								else{
									echo '<label for="contact_id">'.$c_key.'</label>';
									echo '<input placeholder="large-12.cell"  type="input" name="'.$c_key.'" value="'.$c_value.'"/></br>';
								}
								?></br>
							</div>
						</div>
		
					<?php endforeach; ?>
				</div>
		<?php endforeach; ?>
		<input class="secondary button" type="submit" name="submit" value="update contact" />
</form>
