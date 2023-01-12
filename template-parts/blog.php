<div class="csk_blogs_section">
        <div class="row csk">
        <?php
              // adding features categorys post query here
              $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
              query_posts('post_type=post&post_status=publish&posts_per_page=9&order=DESC&paged='. $paged);
              $counter = 0; 
              if(have_posts()) :

                while (have_posts()) : the_post();
               if ($counter < 1) {
                $colorClass = "first_color";
                $counter++;

               } else if ($counter < 2) {
                $colorClass = "second_color";
                $counter++;
   
               } else if ($counter < 3) {
                $colorClass = "third_color";
                $counter++;
               }
               else if ($counter < 4) {
                $colorClass = "forth_color";
                $counter = 0;
               } else {
                console.log('silence is gold');
               }
              ?>
            <div class="col-md-6 col-lg-4">
              <div class="csk_blogs <?php echo $colorClass ?>">
              <h2> <a href="<?php echo the_permalink(); ?>"> <?php the_title(); ?></a></h2>
              <div class="csk_excerpt">
                <p><?php the_excerpt();?></p>
              </div>
              <div class="csk_post_meta">
                <div class="csk_date">
                  <?php echo the_time('M j, Y'); ?>
                </div>
                <div class="csk_permalink">
                  <a class="read_more cs_btn" href="<?php echo the_permalink(); ?>">Read More</a>
                </div>
              </div>
              </div>
            </div>    
      <?php
      endwhile;
      ?>
      <div class="col-md-12">
      <!-- End of the main loop -->

        <!-- Start the pagination functions after the loop. -->
        <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
        <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
        <!-- End the pagination functions after the loop. -->
      </div>
      <?php
      endif;
      wp_reset_query();
     ?>
</div>
<?php