<div class="d-flex justify-content-center">
	<div class="card">
		<?php echo validation_errors(); ?>

		<?php echo form_open('workers/add'); ?>
		<div class="card-header">Add worker</div>
		<div class="card-body">
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>" required>
				</div>

				<div class="form-group">
					<label for="surname">Surname:</label>
					<input class="form-control" type="text" name="surname" value="<?php echo set_value('surname'); ?>" required>
				</div>
				<div class="form-group">
					<label for="salary">Salary:</label>
					<input class="form-control" type="text" name="salary" value="<?php echo set_value('salary'); ?>" required>
				</div>
				<div class="from-group">
					<label for="mail">Mail:</label>
					<input class="form-control" type="email" name="mail" value="<?php echo set_value('mail'); ?>" required>
				</div>
				<div class="form-group">
					<label for="manager_id">Manager:</label>
					<select class="form-control" name="manager_id">
						<option value="">No Manager</option>
						<?php foreach ($managers as $manager): ?>
							<option value="<?php echo $manager['id']; ?>">
								<?php echo $manager['name']; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label for="position">Position:</label>
					<select class="form-control" name="position" required>
						<?php foreach ($positions as $position): ?>
							<option value="<?php echo $position['id']; ?>"><?php echo $position['name']; ?></option>
						<?php endforeach; ?>
					</select>
					<br>
				</div>
		</div>
		<div class="card-footer text-center">
			<input class="btn btn-info" type="submit" value="Add Worker">
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
