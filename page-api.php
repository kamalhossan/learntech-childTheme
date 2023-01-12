<?php 
/* Template Name: API Response */

get_header();

 ?>

<?php

$url = 'https://api.apprenticeships.education.gov.uk/vacancies/vacancy?FilterBySubscription=true&PageSize=24';
$temp_args = [
    'Ocp-Apim-Subscription-Key' => '46d27d8662024003ba9c0d45f784a10b',
    'X-Version' => '1',
	'FilterBySubscription' => 'true'
];
$args = array('headers' => $temp_args);
$response_raw = wp_remote_get($url, $args);
$data = json_decode(wp_remote_retrieve_body($response_raw));

?>

<div class="jobs_board">
    <div class="container mt-5 mb-5">
 		<h1 style="text-align: center;"><?php the_title();?></h1>
        <div class="row mt-3">
          <?php foreach( $data as $repository ) {
                  foreach ( $repository as $company ) : 
					$deadline = $company->closingDate;
					$deadline_date = strtotime($deadline);
					?>
                  <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $company->title ?></h5>  
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $company->employerName?></h6>
							<p><b>Provider Name:</b><br> <?php echo $company->providerName ?></p>
                            <p class="card-text"><?php echo $company->description ?></p>
							
							<div class="jobs_short_desc">
								<div class="jobs_desc_row">
									<span><b>Hours Per Week:</b></span>
									<span><p> <?php echo $company->hoursPerWeek ?> Hrs</p></span>
								</div>
								<!--
								<div class="jobs_desc_row">
									<span><b>Provider:</b> </span>
									<span><?php echo $company->providerName ?></span>
								</div> -->
								<div class="jobs_desc_row">
									<span><b>Position:</b></span>
									<span><?php echo $company->numberOfPositions ?> available </span>
								</div>
								<div class="jobs_desc_row">
									<span><b>Deadline:</b></span>
									<span><?php echo date('d/M/Y', $deadline_date); ?></span>
								</div>
							</div>
                            <div class="read_more_div">
								<a target="_blank" href="<?php echo $company->vacancyUrl ?>" class="card-link">View Post</a>
							</div>
                           
                          </div>
                      </div>
                    </div>

                  <?php endforeach; 
            }
            ?>    
        </div>
    </div>
</div>

<?php get_footer();
