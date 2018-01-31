<?php 
	include_once('resources/init.php'); 
	
	$post = get_posts($_GET['id']);

	if ( isset($_POST['title'], $_POST['contents'], $_POST['category']) ) {
			//var_dump($_POST);
		$errors = array();

		$title 		= trim($_POST['title']);
		$contents 	= trim($_POST['contents']);

		if ( empty($title)) {
			$errors[] = 'You need to supply a title';
		} else if ( strlen($title) > 255 ){
			$errors[] = 'The title can not be longer than 255  characters';	
		}
		if ( empty($contents) ) {
			$errors[] = 'You need to supply some text';
		}
		if ( ! category_exists('id', $_POST['category']) ){
			$errors[] = 'That category does not exist';	
		}

		if ( empty($errors) ) {
			edit_post($_GET['id'], $title, $contents, $_POST['category']);
			
			header('location: index.php?id=' . $post[0]['post_id']);
			
			die();
		}
	}
?>
<!DOCTYPE html>
	<html lang="pt-br">

<head>
	<title>MyBlog:</title>
	<?php include "includes/_head.php" ?>
</head>
<body>
<?php include "includes/_nav.php" ?>
	<div class="container">
		<div class="row">
		<div class="span6 offset3">
		<br>
			<h1>Editar Publicação</h1>
				<hr>
				
				<?php
				if ( isset($errors) && ! empty($errors) ) {
					echo '<div class="alert alert-block"><button type="button" class="close" data-dismiss="alert">&times;</button><ul><li>', implode('<li></li>', $errors), '</li></ul></div>';
				}
				?>
				<form action="" method="post">
					<div>
						<label for="title"> Titulo:</label>
						<input type="text" name="title" value="<?php echo $post[0]['title']; ?>">
					</div>
					<div>
						<label for="contents"> Informações:</label>
						<textarea name="contents" rows="15" cols="50"><?php echo $post[0]['contents']; ?></textarea>
					</div>
					<div>
						<label>Categorias:</label>
						<select name="category">
							<?php 
								foreach ( get_categories() as $category) {
									$selected = ( $category['name'] == $post[0]['name'] ) ? 'selected' : '' ;
									//echo("<option value=\"" .  $category["id"] . "$selected" . "\">{$category['name']}</option>");
								?>

								<option value="<?php echo $category['id']; ?>" <?php echo $selected; ?>>  <?php echo $category['name']; ?> </option>
							<?php 
								}
							?>
						</select>
					</div>
					<div>
						<input type="submit" value="Add Publicação" class="btn btn-success">
					</div>
				</form>
		</div>
	</div>
		</div>
	</div>
		
</body>
</html>

