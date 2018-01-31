<?php 

include_once('resources/init.php');


#$posts = ( isset($_GET['id']) ) ? get_posts($_GET['id']) : get_posts();

$posts = get_posts(((isset($_GET['id'])) ? $_GET['id'] : null));

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>MyBlog</title>
	<?php include "includes/_head.php" ?>
</head>

<body>
<style>

h1 {
	font-family: Pacifico, serif;

}
</style>
	<!--<section class="container">-->
		
				<?php include "includes/_nav.php" ?>
				

<!--</div>-->
<div class="container">
	<h1>Cotidiano:</h1>
				<hr>
				<?php
				foreach ( $posts as $post ) {
		
					if ( ! category_exists('name', $post ['name'] ) ){
						$post['name'] = 'Uncategorised';
					}
					?>

					<div class="post">
						<h2><i class="icon-quote-left">&nbsp;&nbsp;</i><a href="index.php?id=<?php echo $post['post_id']; ?>"><?php echo $post['title']; ?></a></h2>
						<small> Postado <?php echo date('d-m-Y h:i:s', strtotime($post['date_posted'])); ?>
							em <a href="category.php?id=<?php echo $post['category_id']; ?>"><?php echo $post['name'];?></a>
						</small>
						<p class="post-content"><?php echo nl2br($post['contents']);?></p>

						<div class="post-functions">
							<ul>
								<li><a href="delete_post.php?id=<?php echo $post["post_id"]; ?>"> Apagar </a></li>
								<li><a href="edit_post.php?id=<?php echo $post['post_id']; ?>"> Editar </a></li>
							</ul>
						</div>
						<br />
					</div>
					<?php
				}
				?>
			</div>

		</div>
	</div>
</body>
</html>