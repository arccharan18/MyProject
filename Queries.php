<!-- queries.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Queries</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style>
		body {
			background-color: #f5f5f5;
			color: #333;
			font-family: Arial, sans-serif;
		}

		h1 {
			color: #007bff;
			margin-top: 30px;
			margin-bottom: 30px;
		}

		form {
			background-color: #fff;
			border: 1px solid #ddd;
			padding: 20px;
			border-radius: 5px;
		}

		form label {
			font-weight: bold;
		}

		form button[type="submit"] {
			background-color: #007bff;
			color: #fff;
			border: none;
			border-radius: 3px;
			padding: 10px 20px;
			margin-top: 20px;
			cursor: pointer;
		}

		form button[type="submit"]:hover {
			background-color: #0062cc;
		}

		.alert-success {
			color: #155724;
			background-color: #d4edda;
			border-color: #c3e6cb;
			padding: 10px;
			margin-top: 20px;
			margin-bottom: 0;
			border-radius: 3px;
		}
	</style>
</head>
<body>

	<div class="container">
		<h1>Queries</h1>

		<form method="POST" action="submit_query.php">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" id="name" name="name" required>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email" required>
			</div>
			<div class="form-group">
				<label for="query">Query:</label>
				<textarea class="form-control" id="query" name="query" rows="5" required></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>

		<?php if(isset($_GET['success'])) { ?>
			<div class="alert alert-success" role="alert">
				Your query has been submitted successfully!
			</div>
		<?php } ?>

	</div>

</body>
</html>
