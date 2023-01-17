<div class="homepage_vacancies startDates">
		<?php 
			$startDates = new WP_Query( array(
				'post_type' => 'dates',
				'posts_per_page' => 4,
				'order' => 'DESC',
				'orderby' => 'date',
				)
			);
			if ($startDates->have_posts()) {
				while ($startDates->have_posts()) {
					$startDates->the_post();
			
					$description = get_field( "descriptions");
					$level = get_field( "level");
					$month = get_field( "dates");
					
			?>		
				<div class="row cs">
				  <div class="company_info column-8 col">
					<h5><?php the_title();?></h5>  
					<p><?php echo $description; ?></p>
				  </div>
				  <div class="vacancy_info column-4 col">
					<p><b><?php echo 'Level ' . $level; ?></b><br><?php echo $month; ?></p>
				  </div>
				</div>
			<?php
				}
			} else {
				echo 'no posts found';
			}
			  wp_reset_postdata();
?>	
</div>
