<?php
// [bartag foo="foo-value"]
function ninja_list_output_posts( $atts ) {
  wp_enqueue_style( 'ninja_post_styles', plugins_url('/css/ninja-post-styles.css', __FILE__) );
  $loop = new WP_Query( array( 'post_type' => 'ninja_list_post_type', 'posts_per_page' => -1 ) );
  while ( $loop->have_posts() ) : $loop->the_post();
    ?>
    <h3 class="ninja_list_title"><?php the_title(); ?></h3>
    <!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->
    <small><?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></small>
   	<!-- Display the Post's content in a div box. -->
   	<div class="ninja_list_display_content">
     		<?php the_content(); ?>
  	</div> <?


    //<!-- Display a comma separated list of the Post's Categories. -->

  endwhile;
  wp_reset_query();
}
add_shortcode( 'ninja_list', 'ninja_list_output_posts' );
