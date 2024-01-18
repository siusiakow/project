<p>Name: <?php echo $worker['name']; ?></p>
<p>Surname: <?php echo $worker['surname']; ?></p>
<p>Salary: <?php echo $worker['salary']; ?></p>
<p>Mail: <?php echo $worker['mail']; ?></p>
<p>Position: <?php echo $worker['position_id']; ?></p>
<p>Manager: <?php echo $worker['manager_id']; ?></p>

<a href="<?php echo site_url('workers/edit/' . $worker['id']); ?>">Edit Worker</a>
<a href="<?php echo site_url('workers'); ?>">Back to Workers List</a>
