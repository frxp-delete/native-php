<?php
	require "db.php";
?>

<header id="header">
	<div class="header__top">
		<div class="container">
			<div class="header__top__logo">
				<h1><?php echo $config["page_title"] ?></h1>
			</div>
			<nav class="header__top__menu">
				<ul>
					<li><a href="/guides/blog">Главная</a></li>
					<li><a href="/guides/blog/pages/about_me.php">Обо мне</a></li>
					<li><a href="#">Я Вконтакте</a></li>
				</ul>
			</nav>
		</div>
	</div>

	<?php
		$categories = mysqli_query($connection, "SELECT * FROM articles_categories")
	?>

	<div class="header__bottom">
		<div class="container">
			<nav>
				<ul>

					<?php
						while ($category = mysqli_fetch_assoc($categories)) {
							?>
							<li>
								<a href="pages/article.php?category=<?php echo $category['id']; ?>">
									<?php echo $category['title']; ?>
								</a>
							</li>
							<?php
						}
					?>

				</ul>
			</nav>
		</div>
	</div>
</header>
