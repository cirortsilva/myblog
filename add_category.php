<?php

include_once("resources/init.php");

if ( isset($_POST['name']) ) {
	$name = trim($_POST['name']);

	if ( empty($name) ){
		$error = 'You must submit a category name.';
	} else if ( category_exists('name', $name) ) {
		$error = 'That category already exists.';
	} else if ( strlen($name) > 24 ) {
		$error = ' Category names can be max 24 characters.' ;
	}

	if ( ! isset($error) ) {
		add_category($name);
		$success = '<i class="icon-ok">&nbsp;</i>The category has been added';

		header("location: add_post.php");
	}
}

?>

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
			<h1>Adicionar Categorias:</h1>
				
			
				<?php
				if ( isset($errors) && ! empty($errors) ) {
					echo '<div class="alert alert-block"><button type="button" class="close" data-dismiss="alert">&times;</button><ul><li>', implode('<li></li>', $errors), '</li></ul></div>';
				}
				?>
			<hr>
			<br>
			<form action="" method="post">
					<div>
						<label class="control-label" for="inputError"> Nome: </label>
						<input type="text" name="name" value="">
						<?php
							 if ( isset($error) ) {
							 	echo " <span class='help-inline'><i class='icon-exclamation'>&nbsp;</i>${error}</span>";
							 }
						?>
						<!--<?php 
							if ( ! isset($error) ) {
								echo "<span class='help-inline'>${success}</span>";
							}
						?>-->
					<br>
					<br>	
					<div>
						<input type="submit" value="Add Categoria" class="btn btn-success">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
<html>

