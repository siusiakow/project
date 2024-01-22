<div class="d-flex justify-content-center">
	<div class="col-sm-3 text-center">
		<a class="btn btn-info w-75 mt-1" href="workers/add">Create worker</a>
		<a class="btn btn-info w-75 mt-1" href="positions">Positions list</a>
		<a class="btn btn-info w-75 mt-1" href="workers/hierarchy">Workers hierarchy</a>
	</div>
	<div class="container-fluid col-sm-6">
		<table class="table">
			<thead class="text-center">
				<tr>
					<th class="col">Id</th>
					<th class="col">Name</th>
					<th class="col">Surname</th>
					<th class="col">Salary</th>
					<th class="col">Mail</th>
					<th class="col">Position</th>
					<th class="col">Manager id</th>
					<th class="col">Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($workers as $worker): ?>
				<tr>
					<td><?php echo $worker['id']; ?></td>
					<td><?php echo $worker['name']; ?></td>
					<td><?php echo $worker['surname']; ?></td>
					<td><?php echo $worker['salary']; ?></td>
					<td><?php echo $worker['mail']; ?></td>
					<td><?php echo $worker['position_id']; ?></td>
					<td><?php echo $worker['manager_id']; ?></td>
					<th class="text-center">
						<a class="btn btn-primary" href="<?php echo site_url('workers/view/' . $worker['id']); ?>">View</a>
						<a class="btn btn-success" href="<?php echo site_url('workers/edit/' . $worker['id']); ?>">Edit</a>
						<a class="btn btn-danger" href="<?php echo site_url('workers/delete/' . $worker['id']); ?>"
						   onclick="return confirm('Are you sure you want to delete this worker?')">Delete</a>
					</th>
				</tr>
			</tbody>
			<?php endforeach; ?>
		</table>
	</div>
	<div class="col-sm-3">
	</div>
</div>
