<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL ^ E_NOTICE);

	require "./includes/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $config['page_title']; ?></title>

	<!-- Bootstrap Grid -->
	<link rel="stylesheet" type="text/css" href="./media/assets/bootstrap-grid-only/css/grid12.css">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

	<!-- Custom -->
	<link rel="stylesheet" type="text/css" href="./media/css/style.css">
</head>
<body>

<div id="wrapper">

	<?php include "./includes/header.php" ?>

	<div id="content">
		<div class="container">
			<div class="row">

				<section class="content__left col-md-8">
					<div class="block">
						<a href="articles.php">Все записи</a>
						<h3>Новейшее_в_блоге</h3>
						<div class="block__content">
							<div class="articles articles__horizontal">

								<?php
									$articles = mysqli_query($connection, "SELECT * FROM articles ORDER BY id DESC LIMIT 10");
								?>

								<?php
									while ($article = mysqli_fetch_assoc($articles)) {
										?>

										<article class="article">

											<div class="article__image"
												  style=
												  "background-image: url(./static/images/<?php echo $article['image']; ?>">
											</div>

											<div class="article__info">
												<a href="./pages/article.php?category=<?php echo $article['id']; ?>">
													<?php echo $article['title']; ?>
												</a>

												<div class="article__info__meta">
													<?php
														$article_category = false;
														foreach ($categories as $category) {
															if ($category['id'] == $article['category_id']) {
																$article_category = $category;
																break;
															}
														}
													?>
													<small>Категория:
														<a href="/articles.php?category=<?php echo $article_category['id'] ?>">
															<?php echo $article_category['title']; ?>
														</a>
													</small>
												</div>

												<div class="article__info__preview">
													<?php echo mb_substr($article['text'], 0, 50, 'utf-8') . "..." ?>
												</div>
											</div>
										</article>

										<?php
									}
								?>

							</div>
						</div>
					</div>

					<div class="block">
						<a href="/articles.php?category=1">Все записи</a>
						<h3>Category 1 [Новейшее]</h3>
						<div class="block__content">
							<div class="articles articles__horizontal">

								<?php
									$articles = mysqli_query($connection, "SELECT * FROM articles WHERE category_id = 1 ORDER BY id DESC LIMIT 10");
								?>

								<?php
									while ($article = mysqli_fetch_assoc($articles)) {
										?>

										<article class="article">

											<div class="article__image"
												  style=
												  "background-image: url(./static/images/<?php echo $article['image']; ?>">
											</div>

											<div class="article__info">
												<a href="/article.php?category=<?php echo $article['id']; ?>">
													<?php echo $article['title']; ?>
												</a>

												<div class="article__info__meta">
													<?php
														$article_category = false;
														foreach ($categories as $category) {
															if ($category['id'] == $article['category_id']) {
																$article_category = $category;
																break;
															}
														}
													?>
													<small>Категория:
														<a href="/articles.php?category=<?php echo $article_category['id'] ?>">
															<?php echo $article_category['title']; ?>
														</a>
													</small>
												</div>

												<div class="article__info__preview">
													<?php echo mb_substr($article['text'], 0, 50, 'utf-8') . "..." ?>
												</div>
											</div>
										</article>

										<?php
									}
								?>

							</div>
						</div>
					</div>

					<div class="block">
						<a href="/articles.php?category=2">Все записи</a>
						<h3>Category 2 [Новейшее]</h3>
						<div class="block__content">
							<div class="articles articles__horizontal">

								<?php
									$articles = mysqli_query($connection, "SELECT * FROM articles WHERE category_id = 2 ORDER BY id DESC LIMIT 10");
								?>

								<?php
									while ($article = mysqli_fetch_assoc($articles)) {
										?>

										<article class="article">

											<div class="article__image"
												  style=
												  "background-image: url(./static/images/<?php echo $article['image']; ?>">
											</div>

											<div class="article__info">
												<a href="/article.php?category=<?php echo $article['id']; ?>">
													<?php echo $article['title']; ?>
												</a>

												<div class="article__info__meta">
													<?php
														$article_category = false;
														foreach ($categories as $category) {
															if ($category['id'] == $article['category_id']) {
																$article_category = $category;
																break;
															}
														}
													?>
													<small>Категория:
														<a href="/articles.php?category=<?php echo $article_category['id'] ?>">
															<?php echo $article_category['title']; ?>
														</a>
													</small>
												</div>

												<div class="article__info__preview">
													<?php echo mb_substr($article['text'], 0, 50, 'utf-8') . "..." ?>
												</div>
											</div>
										</article>

										<?php
									}
								?>

							</div>
						</div>
					</div>
				</section>

				<section class="content__right col-md-4">
					<?php include "./includes/sidebar.php" ?>
				</section>

			</div>
		</div>
	</div>

	<?php include "includes/footer.php" ?>


</div>

</body>
</html>