<?php include_once('resources/init.php') ?>
<!DOCTYPE html>
	<html lang="pt-br">
<head>
	<title>MyBlog</title>
	<?php include "includes/_head.php" ?>
</head>


<body>
<?php include "includes/_nav.php" ?>
<div class="container">
	<div class="row">
		<div class="span6 offset3">
			<br>
			<h1>Lista de Categorias</h1>
			
			<hr>
<?php 
foreach  ( get_categories() as $category ) {
		?>
		<p><a href="category.php?id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a> - <a class="btn btn-danger" href="delete_category.php?id=<?php echo $category['id']; ?>">Deletar</a></p>
		<?php
		}
?>

</div>
</div>
</div>

</body>
</html>

