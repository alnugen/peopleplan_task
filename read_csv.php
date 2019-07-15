<?php include("includes/site_config.php");?>
<!DOCTYPE html>
<html>
	<head>
		<?php include("includes/header.php");?>
	</head>
	<body>
		<?php include("includes/top_design.php");?>
		<?php include("includes/nav.php");?>
		<div class="container" id="main-content">
			<h2>Read CSV</h2>
			<p>The requirement of this task is to read given CSV file and insert all the data into MySQL table with the help of command line PHP.</p>
			<p>For this, run command "php -f upload_csv.php"</p>
			<p>Read CSV works as:
		    <ol>
		      <li>Opens 'employee.csv'</li>
		      <li>Reads data from the file</li>
		      <li>Checks the data in MySQL table to prevent any duplicate entry</li>
					<li> Maintains success and error logs with timestamp </li>
		    </ol>
			</p>
		</div>
		<?php include("includes/footer.php");?>
	</body>
</html>
