<?php get_header(); ?>


<div class="row">
  <div class="span8"> 
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
	  	<?php the_content(); ?> 
	<?php endwhile; else: ?> 
	<?php endif; ?> 
  </div>
 
</div>


<?php get_footer(); ?>