<head>
<style>
	ul { list-style-type: none; margin: 0; padding: 0; }
	li { margin-left: 20px; }
</style>
</head>
<body>

<h2>Workers Hierarchy</h2>

<?php display_hierarchy($hierarchy); ?>

<?php
function display_hierarchy($employees) {
	echo '<ul>';
	foreach ($employees as $employee) {
		echo '<li>';
		echo $employee['name'] . ' ' . $employee['surname'] . ' (' . $employee['position_id'] . ')';
		if (!empty($employee['subordinates'])) {
			display_hierarchy($employee['subordinates']);
		}
		echo '</li>';
	}
	echo '</ul>';
}
?>
<p><a href="../">Back to workers</a></p>
