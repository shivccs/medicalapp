<div class="right_col" role="main">
  <div class="">
     
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Patient Profile </h2>            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
		  
		    <div class="col-md-2 col-sm-3 col-xs-12 profile_left">
			
              <div class="profile_img">
                <div id="crop-avatar">
                  <?php if ($patient_img) { ?>
                  <!-- Current avatar -->
                  <img class="img-responsive avatar-view" src="<?php echo base_url().$patient_img['path'].'/'.$patient_img['file_name']; ?>" alt="Avatar" title="Change the avatar">
                <?php }else{ ?>

                  <img class="img-responsive avatar-view" src="<?php echo base_url(); ?>assets/images/user.png" alt="Avatar" title="Change the avatar">

                <?php } ?>

                </div>
              </div>
			 

   
            

              <!-- start skills -->
              
              
              <!-- end of skills -->

            </div>
      
            <div class="col-md-10 col-sm-9 col-xs-12">

              <div class="profile_title">
                <div class="col-md-6">
                 
                </div>
                <div class="col-md-6">
                  
                </div>
              </div>

              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                  </li>
				   <li role="presentation" ><a href="#tab_content2" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Lifestyle:<?php echo $patient_data['patient_name']; ?></a>
                  </li>
                  <li role="presentation" ><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Allergy</a>
                  </li>
				   <li role="presentation" ><a href="#tab_content4" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Cronic Disease</a>
                  </li>
				   <li role="presentation" ><a href="#tab_content5" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Surgery</a>
                  </li>
				  <li role="presentation" ><a href="#tab_content6" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Symptoms</a>
                  </li>
				   <li role="presentation" ><a href="#tab_content7" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> Record</a>
                  </li>
				   <li role="presentation" ><a href="#tab_content8" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Consultation</a>
                  </li>
                  
                  
                </ul>
                <div id="myTabContent" class="tab-content">
                 
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
     <div class="row">
						
						 <?php foreach ($style as $key => $mcvalue) { ?>
			   <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Smoking </h3>
                    </div>
                    <div class="panel-body">
                          <?php echo $mcvalue['smoking_habbit']; ?>
                    </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Alcohol </h3>
                    </div>
                    <div class="panel-body">
                          <?php echo $mcvalue['alcohol_status']; ?>
                    </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Activity Level </h3>
                    </div>
                    <div class="panel-body">
                          <?php echo $mcvalue['activity_level']; ?>
                    </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Food Prefrence </h3>
                    </div>
                    <div class="panel-body">
                          <?php echo $mcvalue['food_prefrence']; ?>
                    </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Occupation </h3>
                    </div>
                    <div class="panel-body">
                          <?php echo $mcvalue['occupation']; ?>
                    </div>
                </div>
				</div>
						 <?php  }  ?>
						
				</div>

                  </div>
				    <div role="tabpanel" class="tab-pane fade" id="tab_content1" aria-labelledby="profile-tab">
                     <div class="panel panel-info" style="margin: 1em;">
					     <div class="row">
						
						 <?php foreach ($allergy as $key => $mcvalue) { ?>
			   <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Allergy Name</h3>
                    </div>
                    <div class="panel-body">
                          <?php echo $mcvalue['allergy_name']; ?>
                    </div>
                </div>
				</div>
						 <?php  }  ?>
						
				</div>
					 </div>

                  </div>
				   <div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="profile-tab">
                     <div class="panel panel-info" style="margin: 1em;">
					     <div class="row">
						
						 <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
         
          <div class="x_content">
            
          <div class="row">
            <div class="col-md-12">
                <table id="datatable" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Sno</th>
                      <th> Patient</th>
                      <th>Gender</th>
                     
                      <th> DOB</th>
                      <th>Maritial Status</th>
                      <th>Fever</th>
					     <th>Cough</th>

                        <th>Diabitic</th>
						    <th>Blood Pressure</th>
							    <th>Other Symptom</th>
                    
                    </tr>
                  </thead>


                  <tbody>
                    <?php $sno =1; if ($p_data) {
                              foreach ($p_data as $key => $udvalue) { ?>
                    <tr>
                      <td><?php echo $sno; ?></td>
                      <td><?php echo $udvalue['patient_name']; ?></td>
                      <td><?php echo $udvalue['gender']; ?></td>
                       <td><?php echo $udvalue['dob']; ?></td>
                      <td><?php echo $udvalue['maritial_status']; ?></td>
					  <td><?php echo $udvalue['fever']; ?></td>
					  <td><?php echo $udvalue['cough']; ?></td>
					  <td><?php echo $udvalue['diabetic']; ?></td>
					  <td><?php echo $udvalue['blood_pressure']; ?></td>
					  <td><?php echo $udvalue['other_symptom']; ?></td>
                     
					  
                     
                    </tr>
                    <?php $sno++; }} ?>
                  </tbody>
              </table>
            </div>
          </div>
          </div>
        </div>
      </div>
						
				</div>
					 </div>

                  </div>
				     <div role="tabpanel" class="tab-pane fade" id="tab_content8" aria-labelledby="profile-tab">
                     <div class="panel panel-info" style="margin: 1em;">
					     <div class="row">
						
						 <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
         
          <div class="x_content">
            
          <div class="row">
            <div class="col-md-12">
                <table id="datatable" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Sno</th>
                      <th> Patient</th>
                      <th>Record Id</th>
                     
                      <th> patient</th>
                     
                      <th>Call Type</th>
					     <th>Call Duration</th>

                        <th>Amount</th>
						    <th>Promo</th>
							   
                    
                    </tr>
                  </thead>


                  <tbody>
                    <?php $sno =1; if ($consult) {
                              foreach ($consult as $key => $udvalue) { ?>
                    <tr>
                      <td><?php echo $sno; ?></td>
                      <td><?php echo $udvalue['patient_name']; ?></td>
                      <td><?php echo $udvalue['patient_record_id']; ?></td>
                       <td><?php echo $udvalue['first_name'].$udvalue['last_name']; ?></td>
                      
					  <td><?php echo $udvalue['call_type']; ?></td>
					  <td><?php echo $udvalue['call_duration']; ?></td>
					  <td><?php echo $udvalue['amount']; ?></td>
					  <td><?php echo $udvalue['promo']; ?></td>
					  
					  
                     
                    </tr>
                    <?php $sno++; }} ?>
                  </tbody>
              </table>
            </div>
          </div>
          </div>
        </div>
      </div>
						
				</div>
					 </div>

                  </div>
				   <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                     <div class="panel panel-info" style="margin: 1em;">
					     <div class="row">
						
						 <?php foreach ($cronic as $key => $mcvalue) { ?>
			   <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Cronic Disease Name</h3>
                    </div>
                    <div class="panel-body">
                          <?php echo $mcvalue['cronic_disease_name']; ?>
                    </div>
                </div>
				</div>
						 <?php  }  ?>
						
				</div>
					 </div>

                  </div>
				    <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="profile-tab">
                     <div class="panel panel-info" style="margin: 1em;">
					     <div class="row">
						
						 <?php foreach ($symptom as $key => $mcvalue) { ?>
			   <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Symptom Name</h3>
                    </div>
                    <div class="panel-body">
                          <?php echo $mcvalue['symptom_name']; ?>
                    </div>
                </div>
				</div>
						 <?php  }  ?>
						
				</div>
					 </div>

                  </div>
				   <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                     <div class="panel panel-info" style="margin: 1em;">
					     <div class="row">
						
						 <?php foreach ($surgery as $key => $mcvalue) { ?>
			   <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Surgery Name</h3>
                    </div>
                    <div class="panel-body">
                          <?php echo $mcvalue['surgery_name']; ?>
                    </div>
                </div>
				</div>
						 <?php  }  ?>
						
				</div>
					 </div>

                  </div>
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="profile-tab">
				
 <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>patient_registration/register">
  <div class="panel panel-info" style="margin: 1em;">
                    <div style="background-color:#2A3F54; color:white;" class="panel-heading">
                        <h3 class="panel-title"> Information</</h3>
                    </div>
					</div>
             
              <div class="row">
			   <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Name:<?php echo $patient_data['patient_name']; ?></h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $patient_data['patient_name']; ?>
                    </div>
                </div>
				</div>
				  <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Phone</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $patient_data['phone_number']; ?>
                    </div>
                </div>
				</div>
				  <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Email</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $patient_data['email']; ?>
                    </div>
                </div>
				</div>
				  <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">DOB</h3>
                    </div>
                    <div class="panel-body">
                      <?php echo $patient_data['dob']; ?>
                    </div>
                </div>
				</div>
				  <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Gender</h3>
                    </div>
                    <div class="panel-body">
					<?php echo $patient_data['gender']; ?>
                    </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Maritial Status</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $patient_data['maritial_status']; ?>
				  </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Height</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $patient_data['height']; ?>
				  </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Weight</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $patient_data['weight']; ?>
				  </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Blood Group</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $patient_data['blood_group']; ?>
				  </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Address</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $patient_data['address']; ?>
				  </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">City</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $patient_data['city']; ?>
				  </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">State</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $patient_data['state']; ?>
				  </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Latitude</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $patient_data['latitude']; ?>
				  </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Longitude</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $patient_data['longitude']; ?>
				  </div>
                </div>
				</div>
				
				
				
				
               </div>

             
              
             

            

              <br>
			 
             
       
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  
 
  
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $('#state').change(function(){
      $('#city').empty();
      var state =$('#state').val();
      if (state.length>0) {
          $.ajax({
                type: 'POST',
                url: base_url + 'user_registration/get_cities',
                data: JSON.stringify(state),
                dataType: 'json',
             })
             .done(function(json) {
                $('#roh').hide();
				$('#city').show();
                var city_html = '<option value="">Select City</option>';

                $.each(json.cities, function(i, item) {
                    city_html = city_html + '<option value="'+item.id+'">'+item.name+'</option>';
                });

                $('#city').append(city_html); 
             
             })
              .fail(function(xhr, status, errorThrown) {
                alert('Something went wrong!');
             }); 
     
      }else{
               var city_html = '<option value="">No City</option>';
               $('#city').append(city_html); 
      }//end of if      
             
    }); // end of change state
</script>

<style>
input:read-only {
  background-color: yellow;
}
</style>