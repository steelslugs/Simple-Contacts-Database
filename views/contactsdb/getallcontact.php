<h2><?php echo $title; ?></h2>
<?php echo validation_errors(); ?>

<?php echo form_open('Contact_controller/viewit/showcontact',''); ?>
	<select name="x">
		<?php foreach ($contact as $contacts): ?>
				<div >
				

					<option value="<?php echo $contacts['contact_id']; ?>">
				<?php foreach ($contacts as $c_key => $c_value): ?><?php
				if ($c_key==="first_name"){
					//echo $c_key.'>>>>'.$c_value;		
					echo $c_value .' ' ;
				}
				if ($c_key==="last_name"){
					//echo $c_key.'>>>>'.$c_value;		
					echo $c_value .' ' ;
				}
	
?>

<?php endforeach; ?>
					</option>
				</div>
		<?php endforeach; ?>
	</select>
	<input class="secondary button" type="submit" name="submit" value="show contact" />
</form>
