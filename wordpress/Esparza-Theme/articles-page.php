<?php
/*
Template Name: Articles Page
*/
?>
<?php get_header(); ?>
<script>
  // JS only for the switch
$(function(){
  $("#switch-view").click(function(){
    $(this).find("button").toggleClass("active");
    $(".article-wrapper").toggleClass("bloc col-xs-12 col-xs-4");
  });
});
</script>
	<div class="row-fluid">
		<div class="span8">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	        <div class="container-fluid main-content inner-content">
		        <h1><?php the_title(); ?></h1>
		        <div class="entry">
					<?php
						$query = array (
						    'posts_per_page' => 10,
						    'category_name' => 'article',
						    'orderby' => 'date',
						    'order' => 'DESC'
						);
						$queryObject = new WP_Query($query);
						if ($queryObject->have_posts()) {
					?>
						<div class="row">
					<?php
							while ($queryObject->have_posts()) {
								$queryObject->the_post();
					?>
							<div class="col-xs-12 article-wrapper">
						      <article>
						        <a href="<?php the_permalink(); ?>" class="more">read more</a>
						        <div class="img-wrapper"><img src="http://lorempixel.com/150/150/fashion" alt="" /></div>
						        <h4><?php echo get_the_title(); ?></h4>
						        <p><?php the_excerpt(); ?></p>
						      </article>
						    </div>
					<?php
							}
					?>
						</div>
					<?php
						}
						wp_reset_postdata();
					?>
				</div>
	        </div>	
	        <?php endwhile; endif; ?>	        	
		</div><!--/span8-->
		<div class="span4">
				<?php //get_sidebar(); ?>
		</div><!--/span4-->
	</div><!--/row-->
</div><!-- container -->
<?php get_footer(); ?>