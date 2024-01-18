<table border="1">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Actions</th>
	</tr>
	<?php foreach ($positions as $position): ?>
		<tr>
			<td><?php echo $position['id']; ?></td>
			<td><?php echo $position['name']; ?></td>
			<td>
				<a href="<?php echo site_url('positions/edit/' . $position['id']); ?>">Edit</a>
				<a href="<?php echo site_url('positions/delete/' . $position['id']); ?>">Delete</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
<p><a href="positions/add">Add positions</a></p>
<p><a href="workers">Workers List</a></p>
