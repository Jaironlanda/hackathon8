
	<main role="main">
	<div class="container">
		<br><br><br>
	    <!-- <hr class="featurette-divider"> -->
	    <!-- <hr class="featurette-divider"> -->
	    <div class="row card-row">
			<div class="card mx-auto">
				  <!-- <img class="card-img-top" src="https://via.placeholder.com/770x400" alt="Card image cap"> -->
				  <img class="card-img-top-quiz" src="<?php echo base_url('assets/img-web/Ratu-2018.jpg') ?>" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title">Question <?php echo $question[0]->ques_id?></h5>
				    <p class="card-text"><?php echo $question[0]->question?></p>
					
					<?php 
						for ($i=0; $i<3 ; $i++) { 
								echo 
								'<div class="form-check">
									<label class="form-check-level">
										<input type="radio" class="form-check-input" name="ans[]">'.$question[$i]->answer.'
									</label>
								</div>';
						}
					?>
				<br>
				<div class="row button-row mx-auto d-block text-center">
					<button class="btn btn-danger next-button btn-lg" type="button">Back</button>
					<a class="btn btn-primary btn-lg" href="<?php echo base_url('main/quiz/') . $nextBtn; ?>" role="button">Next</a>
             		
            	</div>
				  </div>
			</div>
		</div>
	    <hr class="featurette-divider">

	</div>

