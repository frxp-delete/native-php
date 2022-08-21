<div class="block">
	<h3>Мы_знаем</h3>
	<div class="block__content">
		<script type="text/javascript"
				  src="//ra.revolvermaps.com/0/0/6.js?i=02op3nb0crr&amp;m=7&amp;s=320&amp;c=e63100&amp;cr1=ffffff&amp;f=arial&amp;l=0&amp;bv=90&amp;lx=-420&amp;ly=420&amp;hi=20&amp;he=7&amp;hc=a8ddff&amp;rs=80"
				  async="async"></script>
	</div>
</div>

<div class="block">
	<h3>Топ читаемых статей</h3>
	<div class="block__content">
		<div class="articles articles__vertical">

			<?php
			$articles = mysqli_query($connection, "SELECT * FROM articles ORDER BY views DESC LIMIT 5");
			?>

			<?php
			while ($article = mysqli_fetch_assoc($articles)) {
				?>

				<article class="article">

					<div class="article__image"
						  style=
						  "background-image: url(../static/images/<?php echo $article['image']; ?>">
					</div>

					<div class="article__info">
						<a href="../pages/article.php?category=<?php echo $article['id']; ?>">
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

