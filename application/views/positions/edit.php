<?php echo validation_errors(); ?>

<?php echo form_open('positions/edit/' . $position['id']); ?>

	<label for="name">Name:</label>
	<input type="text" name="name" value="<?php echo set_value('name', $position['name']); ?>" required>
	<br>

	<input type="submit" value="Update Position">

<?php echo form_close(); ?>
