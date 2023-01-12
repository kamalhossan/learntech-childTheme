<?php

$url = 'https://api.apprenticeships.education.gov.uk/vacancies/vacancy?FilterBySubscription=true&PageSize=4';
	$temp_args = [
	'Ocp-Apim-Subscription-Key' => '46d27d8662024003ba9c0d45f784a10b',
	'X-Version' => '1',
'FilterBySubscription' => 'true'
	];
	$args = array('headers' => $temp_args);
	$response_raw = wp_remote_get($url, $args);
	$data = json_decode(wp_remote_retrieve_body($response_raw));
  ?>
		<div class="homepage_vacancies">
					<?php foreach( $data as $repository ) {
                  foreach ( $repository as $company ) :
                    $deadline = $company->closingDate;
                    $date = strtotime($deadline);
                  ?>
                  <div class="row cs">
                    <div class="company_info column-8 col">
                      <h5><?php echo $company->title ?></h5>  
                      <p><?php echo $company->providerName ?></p>
                    </div>
                    <div class="vacancy_info column-4 col">
                      <p><b>Deadline:</b> <?php echo date('d/M/Y', $date); ?></p>
                    </div>

                  </div>
                  <?php endforeach; 
					}
				?>    
			</div>