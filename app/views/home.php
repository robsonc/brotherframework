<?php include 'header.php'; ?>
<section>
	<h1><?php echo $this->title; ?></h1>

	<?php foreach($this->users as $user): ?>
		<p><strong>Username: </strong><?php echo $user->username; ?></p>
	<?php endforeach; ?>
		
</section>
<?php include 'footer.php'; ?>