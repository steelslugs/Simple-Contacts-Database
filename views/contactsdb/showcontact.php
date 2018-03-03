<h2><?php echo $title; ?></h2>
<?php echo validation_errors(); ?>



	
		<?php foreach ($contact as $contacts): 
		// need to change this so fields are displayed outside the option
		// tag and structure so first/last name address?? is presented
		// 
		?>
		<?php echo form_open('Contact_controller/editcontact','');?>
				<div >
				<?php foreach ($contacts as $c_key => $c_value): ?>
				<?php
				//could display other fields to id contacts below. 
				// if ($c_key==="last_name"|| $c_key==="first_name"){
				// echo $c_key.':::::'.$c_value;		
				// }
				if ($c_key==="salutation"){
					//echo $c_key.'>>>>'.$c_value;		
					echo '<div>'.$c_value .' ' ;
				}
				if ($c_key==="first_name"){
					//echo $c_key.'>>>>'.$c_value;		
					echo ''.$c_value .' ' ;
				}
				if ($c_key==="last_name"){
					//echo $c_key.'>>>>'.$c_value;		
					echo $c_value .'</br> ' ;
				}
				if ($c_key==="DOB"){
					//echo $c_key.'>>>>'.$c_value;		
					echo $c_value .'</br> ' ;
				}
				if ($c_key==="address"){
					//echo $c_key.'>>>>'.$c_value;		
					echo $c_value .'</div> ' ;
				}
				?>

		<?php endforeach;
		//x below replaces the value of select 
		?>
		<input type="hidden" name="x" value="<?php echo $contacts['contact_id']; ?>"/></br>
		<input class="secondary button" type="submit" name="submit" value="edit contact" />
				</div></form>
		<?php endforeach; ?>

