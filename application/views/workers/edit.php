<?php echo validation_errors(); ?>

<?php echo form_open('workers/edit/' . $worker['id']); ?>

	<label for="name">Name:</label>
	<input type="text" name="name" value="<?php echo set_value('name', $worker['name']); ?>" required>
	<br>

	<label for="surname">Surname:</label>
	<input type="text" name="surname" value="<?php echo set_value('surname', $worker['surname']); ?>" required>
	<br>

	<label for="salary">Salary:</label>
	<input type="text" name="salary" value="<?php echo set_value('salary', $worker['salary']); ?>" required>
	<br>

	<label for="mail">Mail:</label>
	<input type="email" name="mail" value="<?php echo set_value('mail', $worker['mail']); ?>" required>
	<br>

	<label for="position">Position:</label>
	<select name="position" required>
		<?php foreach ($positions as $position): ?>
			<option value="<?php echo $position['id']; ?>"><?php echo $position['name']; ?></option>
		<?php endforeach; ?>
	</select>
	<br>

	<label for="manager_id">Manager:</label>
	<select name="manager_id">
		<option value="">No Manager</option>
		<?php foreach ($managers as $manager): ?>
			<option value="<?php echo $manager['id']; ?>" <?php echo ($manager['id'] == $worker['manager_id']) ? 'selected' : ''; ?>>
				<?php echo $manager['name']; ?>
			</option>
		<?php endforeach; ?>
	</select>
	<br>
	<input type="hidden" name="id" value="<?php echo $worker['id']; ?>">
	<input type="submit" value="Update Worker">

	<?php echo form_close(); ?>
