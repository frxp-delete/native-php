<?php
	require "../includes/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $config['page_title']; ?></title>

	<!-- Bootstrap Grid -->
	<link rel="stylesheet" type="text/css" href="../media/assets/bootstrap-grid-only/css/grid12.css">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

	<!-- Custom -->
	<link rel="stylesheet" type="text/css" href="../media/css/style.css">
</head>
<body>

<div id="wrapper">

	<?php include "../includes/header.php"; ?>

	<?php
		$article_q = mysqli_query($connection, "SELECT * FROM articles WHERE id = " . (int) $_GET['category']);
		echo $_GET['id'];
		if (mysqli_num_rows($article_q) <= 0) {
			?>

			<div id="content">
				<div class="container">
					<div class="row">
						<section class="content__left col-md-8">
							<div class="block">
								<h3>Статья не найдена</h3>
								<div class="block__content">
									<div class="full-text">
										Запрашиваемая статься не существует
									</div>
								</div>
							</div>

						</section>
						<section class="content__right col-md-4">
							<?php include "../includes/sidebar.php" ?>
						</section>
					</div>
				</div>
			</div>

			<?php
		} else {
			$article = mysqli_fetch_assoc($article_q);
			mysqli_query($connection, "UPDATE articles SET views = views + 1 WHERE id = " . (int) $_GET['category'])
			?>

			<div id="content">
				<div class="container">
					<div class="row">
						<section class="content__left col-md-8">
							<div class="block">
								<h3><?php echo $article['title']; ?></h3>
								<div><?php echo $article['views']; ?> просмотров</div>
								<div class="block__content">
									<img src="../media/images/post-image.jpg">

									<div class="full-text">
										<?php echo $article['text'] ?>
									</div>
								</div>
							</div>

						</section>
						<section class="content__right col-md-4">
							<?php include "../includes/sidebar.php" ?>
						</section>
					</div>
				</div>
			</div>

			<?php
		}
	?>



	<?php include "../includes/footer.php" ?>


</div>

</body>
</html>
