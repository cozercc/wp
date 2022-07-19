<?php get_header(); ?>

<main role="main">
	<!-- section -->
	<section>

		<h1><?php echo get_search_query(); ?>の検索結果　<?php echo sprintf( '%s 件', $wp_query->found_posts );?></h1>

		<?php get_template_part('loop'); ?>

		<?php get_template_part('pagination'); ?>


		<p class="display-result-num">
			<?php
			echo $wp_query->found_posts;
		?>件の記事がヒットしましたよ♪現在のページ数は
			<?php
			$paged = get_query_var( 'paged', 1 );
			$max_page = $wp_query->max_num_pages;
			echo $paged.' の '.$max_page;
		?>!
		</p>
	</section>
	<!-- /section -->
	<!-- posts by cards -->
	<section>
		<div class="row row-cols-1 row-cols-md-2 g-4">
			<?php if (have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="col">
				<div class="card h-100 w-50 mx-auto">
					<img src="<?php echo catch_that_image(); ?>" class="card-img-top" alt="">
					<div class="card-body">
						<h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						<p class="card-text">
							<?php the_date(); ?> by
							<a href="<?php the_author_link(); ?>"><?php the_author(); ?></a>
						</p>
						<p><?php the_excerpt(); ?></p>
					</div>
					<a href="<?php the_permalink(); ?>" class="btn btn-primary">Go to the page</a>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>