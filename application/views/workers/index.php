
<table border="1">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Surname</th>
		<th>Salary</th>
		<th>Mail</th>
		<th>Position</th>
		<th>Manager id</th>
		<th>Actions</th>
	</tr>
	<?php foreach ($workers as $worker): ?>
		<tr>
			<td><?php echo $worker['id']; ?></td>
			<td><?php echo $worker['name']; ?></td>
			<td><?php echo $worker['surname']; ?></td>
			<td><?php echo $worker['salary']; ?></td>
			<td><?php echo $worker['mail']; ?></td>
			<td><?php echo $worker['position_id']; ?></td>
			<td><?php echo $worker['manager_id']; ?></td>
			<td>
				<a href="<?php echo site_url('workers/view/' . $worker['id']); ?>">View</a>
				<a href="<?php echo site_url('workers/edit/' . $worker['id']); ?>">Edit</a>
				<a href="<?php echo site_url('workers/delete/' . $worker['id']); ?>" onclick="return confirm('Are you sure you want to delete this worker?')">Delete</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
<p><a href="workers/add">Create worker</a></p>
<p><a href="positions">Positions list</a></p>
<p><a href="workers/hierarchy">Workers hierarchy</a></p>
