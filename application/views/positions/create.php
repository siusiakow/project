<?php echo validation_errors(); ?>

<?php echo form_open('positions/add'); ?>

<label for="name">Name:</label>
<input type="text" name="name" value="<?php echo set_value('name'); ?>" required>
<br>

<input type="submit" value="Add Position">

<?php echo form_close(); ?>
