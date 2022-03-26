<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-4">
            <div class="border-bottom text-center pb-4">
              <?php if ($doc_img) { ?>
                <!-- Current avatar -->
                <img class="img-lg rounded-circle mb-3" src="<?php echo base_url().$doc_img['path'].'/'.$doc_img['file_name']; ?>" alt="Avatar" title="Change the avatar">
                <?php }else{ ?>

                <img class="img-lg rounded-circle mb-3" src="<?php echo base_url(); ?>assets/images/user.png" alt="Avatar" title="Change the avatar">

              <?php } ?>

              <div class="d-flex justify-content-center mb-3">
                <form method="post" enctype="multipart/form-data"  action="<?php echo base_url(); ?>doctor_profile/profile_image">
                  <input  type="hidden" name="doctor_id" value="<?php echo $doc_data['doctor_id']; ?>" required>
                  <input class="form-control mb-2"  type="file" name="file"  required>
                  <input type="submit" name="upload" class="btn btn-success" value="upload">
                </form>
              </div>
              <div class="mb-3">
                <h3><?php echo $doc_data['first_name'].' '.$doc_data['last_name']; ?></h3>
                <div class="">
                  <h5 class="mb-0 me-2 text-muted">
                    <?php
                      if ($doc_data['doctor_type']==1) {
                          echo "Affiliate Doctor";
                      }else{
                          echo "Senior Consultant Doctor";
                      }
                    ?>
                  </h5>
                  <div>
                    <i class="typcn typcn-star-full-outline"></i>
                    <i class="typcn typcn-star-half-outline"></i>
                    <i class="typcn typcn-star-outline"></i>
                    <i class="typcn typcn-star-outline"></i>
                    <i class="typcn typcn-star-outline"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="py-4">
              <p class="clearfix">
                <span class="float-left">
                  Status
                </span>
                <span class="float-right text-muted">
                  Active
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Phone
                </span>
                <span class="float-right text-muted">
                  <?php echo $doc_data['phone']; ?>
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Mail
                </span>
                <span class="float-right text-muted">
                  <?php echo $doc_data['email']; ?>
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Category
                </span>
                <span class="float-right text-muted">
                  <?php echo $doc_data['category_name']; ?>
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Address
                </span>
                <span class="float-right text-muted">
                  <?php echo $doc_data['state_name'].', '.$doc_data['city_name'].', '.$doc_data['pincode']; ?>
                </span>
              </p>
            </div>
            <button data-toggle="modal" data-target="#myModal"  value="<?php echo $doc_data['doctor_id']; ?>" class="btn btn-primary btn-block mb-2">Edit Profile</button>
          </div>
          <div class="col-lg-8">
            <div class="mt-4 py-2 border-bottom">
              <h2>Dcotor Activity Report</h2>
              <label id="status" class="text-info">
                <?php
                    if ($this->session->flashdata('msg')) {
                      echo $this->session->flashdata('msg');
                    }
                 ?>
              </label>
            </div>
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>doctor_registration/register">
              <div class="panel panel-info" style="margin: 1em;">
                <h3 class="card-description">Basic Information</</h3>
              </div>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-body" style="text-align:center;">
                      <i class="fa fa-user"></i>
                      <?php echo $doc_data['first_name']; ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-body">
                      <i class="fa fa-user"></i>
                      <?php echo $doc_data['first_name']; ?>  <?php echo $doc_data['last_name']; ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-body">
                      <i class="fa fa-users"></i>  <?php echo $doc_data['father_name']; ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-body">
                      <i class="fa fa-male"></i>  
                      <?php if($doc_data['gender']=='m') { echo "Male";} if($doc_data['gender']=='f') { echo "FeMale";} if($doc_data['gender']=='o') { echo "Other";}   ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="panel panel-info" style="margin: 1em;">
              
                    <div class="panel-body">
                      <i class="fa fa-envelope"></i><?php echo $doc_data['email']; ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-body">
                      <i class="fa fa-phone"></i>  <?php echo $doc_data['phone']; ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-body">
                      <i class="fa fa-birthday-cake"></i>    
                      <?php echo $doc_data['dob']; ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-body">
                      <i class="fa fa-list"></i>  
                      <?php echo $doc_data['category_name']; ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-body">
                      <i class="fa fa-home"></i>   
                      <?php echo $doc_data['address']; ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-body">
                      <i class="fa fa-institution"></i> 
                      <?php echo $doc_data['state_name']; ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-body">
                      <i class="fa fa-institution"></i>  
                      <?php echo $doc_data['city_name']; ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-body">
                      <i class="fa fa-map-pin"></i>
                      <?php echo $doc_data['pincode']; ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-body">
                      <i class="fa fa-map-marker"></i> <?php echo $doc_data['latitude']; ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-body">
                      <i class="fa fa-map-marker"></i>  
                      <?php echo $doc_data['longitude']; ?>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div style="margin: 1em;">
                <h3 class="card-description">Professional Information</</h3>
              </div>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-body">
                      <i class="fa fa-folder"></i> <?php echo $doc_data['regi']; ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-body">
                      <i class="fa fa-university"></i>   
                      <?php echo $doc_data['council']; ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-body">
                      <i class="fa fa-calendar"></i>   
                      <?php echo $doc_data['passout']; ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="panel panel-info" style="margin: 1em;">
                    <i class="fa fa-certificate"></i> 
                    <?php echo $doc_data['degree']; ?>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="panel panel-info" style="margin: 1em;">
                  <div class="panel-body">
                    <i class="fa fa-calendar"></i> 
                    <?php echo $doc_data['passout']; ?>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="panel panel-info" style="margin: 1em;">
                  <div class="panel-body">
                    <i class="fa fa-building"></i> 
                    <?php echo $doc_data['collage']; ?>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="panel panel-info" style="margin: 1em;">
                  <div class="panel-body">
                    <i class="fa fa-user-md"></i> 
                    <?php echo $doc_data['exp']; ?>
                  </div>
                </div>
              </div>
              <div class="ln_solid"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Doctor</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>doctor_profile/edit">
            <div class="title_left">
              <small>Basic Information</small>
              <hr>
            </div>
            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label" for="first-name">First Name <span class="required">*</span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="hidden" required="required" value="<?php echo $doc_data['doctor_id']; ?>" name="doctorid" id="fname" class="form-control">
                <input type="text" required="required" value="<?php echo $doc_data['first_name']; ?>" name="fname" id="fname" class="form-control">
              </div>

              <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label" for="first-name">Last Name <span class="required">*</span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="text" required="required" name="lname" value="<?php echo $doc_data['last_name']; ?>" id="lastname" class="form-control">
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label" for="first-name">Consultation Fee <span class="required">*</span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="text" required="required" name="cfee" value="<?php echo $doc_data['consultation_fee']; ?>" id="cfee" class="form-control">
              </div>

              <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label" for="first-name">Gender <span class="required">*</span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <select class="form-control" name="gender">
                  <option <?php if($doc_data['gender']=='m') echo "selected"; ?> value="m">Male</option>
                  <option <?php if($doc_data['gender']=='f') echo "selected"; ?> value="f">Female</option>
                  <option <?php if($doc_data['gender']=='o') echo "selected"; ?> value="o">Others</option>
                </select>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label" for="first-name">Email <span class="required">*</span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="email" required="required" value="<?php echo $doc_data['email']; ?>" name="email" id="email" class="form-control" readonly>
              </div>

              <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label" for="first-name">Mobile <span class="required">*</span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="mobile" required="required" value="<?php echo $doc_data['phone']; ?>" name="mobile" id="mobile" class="form-control" minlength="10" maxlength="10" readonly>
              </div>
            </div>

            <br>

            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label" for="first-name">DOB <span class="required">*</span></label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="date" required="required" value="<?php echo $doc_data['dob']; ?>"  name="dob" id="dob" class="form-control">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label" for="first-name">Category <span class="required">*</span>
                </label>
              </div>
      
              <div class="col-md-3 col-sm-3 col-xs-12">
                <select class="form-control" name="category" required>
                  <option value="">Select Category</option>
                  <?php if ($category) { 
                        foreach ($category as $key => $catvalue) { ?>
                  <option <?php if($doc_data['category_id']==$catvalue['doctor_category_id']) echo "selected"; ?> value="<?php echo $catvalue['doctor_category_id']; ?>"><?php echo $catvalue['category_name']; ?></option>

                <?php }} ?>
                </select>
              </div>               
            </div>
            <br>
            
            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label" for="first-name">Complete Address</label>
              </div>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" required="required" value="<?php echo $doc_data['address']; ?>" name="address" id="address" class="form-control">
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-12">
               
              </div>              
              <div class="col-md-3 col-sm-3 col-xs-12">
                <select class="form-control" name="state" id="state" required>
                  <option value="">Select State</option>
                  <?php foreach ($states as $key => $svalue) { ?>
                  <option <?php if($doc_data['state']==$svalue['id']) echo "selected"; ?> value="<?php echo $svalue['id']; ?>" ><?php echo $svalue['name']; ?></option>

                  <?php } ?>
                            
                </select>
                <span>Select State</span>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <select class="form-control" name="city" required id="city">
                  <option value="<?php echo $doc_data['city']; ?>"><?php echo $doc_data['city_name']; ?></option>                       
                </select>
                <span>Select City</span>
              </div>
              <div class="col-md-2 col-sm-2 col-xs-12">
                <input type="text" required="required" value="<?php echo $doc_data['pincode']; ?>" name="pincode" class="form-control">
                <span>Pincode</span>
              </div>
            </div>

            <br>

            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-12">
               
              </div>
              
              <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="text" required="required" value="<?php echo $doc_data['latitude']; ?>" name="lat" class="form-control">
                <span>Latitude</span>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="text" required="required" value="<?php echo $doc_data['longitude']; ?>" name="long" class="form-control">
                <span>Longitude</span>
              </div>
            </div>
            <br>
            <div class="title_left">
              <small>Professional Information</small>
              <hr>
            </div>
            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label" for="first-name">Registration No <span class="required">*</span>
                </label>
              </div>
              <div class="col-md-2 col-sm-2 col-xs-12">
                <input type="text" required="required" value="<?php echo $doc_data['regi']; ?>" name="registration_no" class="form-control">
              </div>

              <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label" for="first-name">Medical Council <span class="required">*</span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <select class="form-control" name="mc" required>
                  <option value="">Select Council</option>
                  <?php foreach ($mc as $key => $mcvalue) { ?>
                  <option <?php if($doc_data['council']==$mcvalue['medical_council']) echo "selected"; ?> value="<?php echo $mcvalue['medical_council']; ?>" ><?php echo $mcvalue['medical_council']; ?></option>

                  <?php } ?>
                            
                </select>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <select class="form-control" name="mc_year" required>
                  <option value="">Select Year</option>
                  <?php for ($i=2021; $i >= 1980; $i--) { ?>
                  <option <?php if($doc_data['passout']==$i) echo "selected"; ?> value="<?php echo $i; ?>" ><?php echo $i; ?></option>

                  <?php } ?>
                            
                </select>
                <span>Certification Year</span>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label" for="first-name">Medical Degree<span class="required">*</span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <select class="form-control" name="md">
                  <option value="">Select Degree</option>
                  <?php foreach ($md as $key => $mdvalue) { ?>
                  <option <?php if($doc_data['degree']==$mdvalue['medical_degree']) echo "selected"; ?> value="<?php echo $mdvalue['medical_degree']; ?>" ><?php echo $mdvalue['medical_degree']; ?></option>

                  <?php } ?>
                            
                </select>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <select class="form-control" name="md_year">
                  <option value="">Select Year</option>
                  <?php for ($i=2021; $i >= 1980; $i--) { ?>
                  <option <?php if($doc_data['passout']==$i) echo "selected"; ?> value="<?php echo $i; ?>" ><?php echo $i; ?></option>

                  <?php } ?>
                            
                </select>
                <span>Passout Year</span>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" value="<?php echo $doc_data['collage']; ?>" name="md_college" class="form-control" required>
                <span>Medical College Name</span>
              </div>
            </div>

            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label" for="first-name">Experience<span class="required">*</span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="number" name="experience" value="<?php echo $doc_data['exp']; ?>" min="0" class="form-control" required>
              </div>               
            </div>



            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label" for="first-name">Speciality</label>
                <span class="text-warning">* Select speciality if any</span>
              </div>
              <div class="col-md-8 col-sm-8 col-xs-12">
                
                <div class="checkbox col-md-3 col-sm-3 col-xs-12">
                  <label>
                    <input name="specility" type="radio" class="flat" value="na"> NA
                  </label>
                </div>
      
                <?php if ($specility) { 
                        foreach ($specility as $key => $spcvalue) { ?>
                <div class="checkbox col-md-3 col-sm-3 col-xs-12">
                  <label>
                    <input <?php if($doc_data['speciality_id']==$spcvalue['speciality_id']) echo "checked"; ?> name="specility" type="radio" class="flat" value="<?php echo $spcvalue['speciality_id']; ?>"> <?php echo $spcvalue['speciality_name']; ?>
                  </label>
                </div>

              <?php }} ?>

              </div>
            </div>             
            <div class="ln_solid"></div>
            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-12">
                <button type="submit" class="btn btn-success" id="bt_registration">Submit</button>
              </div>
          
            </div>

          </form>
      </div>
     
    </div>
    
  </div>
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
