<?php 
include_once('resources/init.php');

$posts = get_posts(null, $_GET['id']);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>MyBlog</title>
	<?php include "includes/_head.php" ?>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="span6 offset3">
				<h1>Categorias</h1>
				<br>
				<?php include "includes/_nav.php" ?>
				<hr>
				<br>

				<?php
				foreach ( $posts as $post ) {
					if ( ! category_exists('name', $post ['name'] ) ){
						$post['name'] = 'Uncategorised';
					}
					?>
					<div class="post">
						<h2><i class="icon-quote-left">&nbsp;&nbsp;</i><a href="index.php?id=<?php echo $post['post_id']; ?>"><?php echo $post['title']; ?></a></h2>
						<small> Postado em <?php echo date('d-m-Y h:i:s', strtotime($posts['date_posted'])); ?>
							em <a href="category.php?id=<?php echo $post['category_id']; ?>"><?php echo $post['name'];?></a>
						</small>
						<p class="post-content"><?php echo nl2br($post['contents']);?></p>

						<div class="post-functions">
							<ul>
								<li><a href="delete_post.php?id=<?php echo $post["post_id"]; ?>"> Apagar essa publicação</a></li>
								<li><a href="edit_post.php?id=<?php echo $post['post_id']; ?>"> Editar essa publicação</a></li>
							</ul>
						</div>
						<br />
					</div>


					<?php
				}
				?>
			</div>
		</div>
	</body>
	</html>