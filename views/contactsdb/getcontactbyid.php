<h2><?php echo $title; ?></h2>
<?php echo validation_errors(); ?>

<?php echo form_open('Contact_controller/viewit/showcontact'); ?>

    <label for="contact_id">contact_id</label>
    <input type="input" name="contact_id" /><br />     

    <input type="submit" name="submit" value="show contact" />

</form>
