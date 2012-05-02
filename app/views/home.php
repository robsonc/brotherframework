<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Brother Framework</title>
		<style type="text/css">
			body {font-family: Georgia;}
		</style>
	</head>
	<body>
		<nav>
			<ul>
				<li><a href="/">Principal</a></li>
				<li><a href="/institucional">Institucional</a></li>
			</ul>
		</nav>
		<section>
			<h1><?php echo $title; ?></h1>

			<?php foreach($users as $user): ?>
				<p><strong>Username: </strong><?php echo $user->username; ?></p>
			<?php endforeach; ?>
				
		</section>

	</body>
</html>