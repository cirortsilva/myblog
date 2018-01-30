<?php include_once('resources/init.php') ?>
<!DOCTYPE html>
	<html lang="en">
<head>
	<title>MyBlog</title>
	<?php include "includes/_head.php" ?>
</head>


<body>
<div class="container">
	<div class="row">
		<div class="span6 offset3">
			<h1>Lista de Categorias</h1>
			<br>
			<?php include "includes/_nav.php" ?>
			<hr>
			<br>
<?php 
foreach  ( get_categories() as $category ) {
		?>
		<p><a href="category.php?id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a> - <a href="delete_category.php?id=<?php echo $category['id']; ?>">Deletar</a></p>
		<?php
		}
?>

</div>
</div>
</div>

</body>
</html>

