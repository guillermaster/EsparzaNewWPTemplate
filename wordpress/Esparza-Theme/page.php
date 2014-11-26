<?php get_header(); ?>
	<div class="row-fluid">
		<div class="span8">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	        <div class="container-fluid main-content inner-content">
		        <h1><?php the_title(); ?></h1>
		        <div class="entry">
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				</div>
				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	        </div>	
	        <?php endwhile; endif; ?>	        	
		</div><!--/span8-->
		<div class="span4">
				<?php //get_sidebar(); ?>
		</div><!--/span4-->
	</div><!--/row-->
</div><!-- container -->
<?php get_footer(); ?>