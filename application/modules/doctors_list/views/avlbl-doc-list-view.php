<div class="row">
	<?php foreach ($doctors_data as $key => $udvalue) { ?>
		<div class="col-md-6 grid-margin grid-margin-md-0 stretch-card mb-3">
			<div class="card">
				<div class="card-body text-center">
					<div>
						<img src="../../../../images/faces/face5.jpg" class="img-lg rounded-circle mb-2" alt="profile image">
						<h4><?php echo $udvalue['first_name'].' '.$udvalue['last_name']; ?></h4>
						<p class="mb-0"><?php echo $udvalue['category_name']; ?></p>
					</div>
					<p class="mt-2 card-text">
							Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
							Aenean commodo ligula eget dolor. Lorem
					</p>
					
				</div>
			</div>
		</div>
	<?php } ?>
</div>