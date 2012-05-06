<?php include 'header.php'; ?>
<section>
	<h1>Institucional</h1>
	<?php 
		foreach($this->list as $name):
			echo $name;
		endforeach;
	?>
</section>
<?php include 'footer.php'; ?>