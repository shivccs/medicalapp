<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>User Registration <small>Register new system user</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>user_registration/register">
              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">First Name <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" required="required" name="fname" id="fname" class="form-control">
                </div>

                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Last Name <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" required="required" name="lname" id="lastname" class="form-control">
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Father Name <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" required="required" name="fathername" id="fathername" class="form-control">
                </div>

                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Gender <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control" name="gender">
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                    <option value="o">Others</option>
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
                  <input type="email" required="required" name="email" id="email" class="form-control">
                </div>

                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Mobile <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="mobile" required="required" name="mobile" id="mobile" class="form-control" minlength="10" maxlength="10">
                </div>
              </div>

              <br>

              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">DOB</label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="date" required="required" name="dob" id="dob" class="form-control">
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Role <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control" name="role" required id="role">
                    <?php foreach ($roles as $key => $rvalue) { ?>
                      <option value="<?php echo $rvalue['role_id']; ?>"><?php echo $rvalue['role_name']; ?></option>
                    <?php } ?>
                  </select>
                </div>                
              </div>
              <br>
              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Complete Address</label>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" required="required" name="address" id="address" class="form-control">
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
                    <option value="<?php echo $svalue['id']; ?>" ><?php echo $svalue['name']; ?></option>

                  <?php } ?>
                              
                  </select>
                  <span>Select State</span>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control" name="city" required id="city">
                                                  
                  </select>
                  <span>Select City</span>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <input type="text" required="required" name="pincode" class="form-control">
                  <span>Pincode</span>
                </div>
              </div>

              <br>

              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                 
                </div>
                
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" required="required" name="lat" class="form-control">
                  <span>Latitude</span>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" required="required" name="long" class="form-control">
                  <span>Longitude</span>
                </div>
              </div>             
              <div class="ln_solid"></div>
              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <button type="submit" class="btn btn-success" id="bt_registration">Submit</button>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <label id="status" class="text-info">
                    <?php
                        if ($this->session->flashdata('msg')) {
                          echo $this->session->flashdata('msg');
                        }
                     ?>
                  </label>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>


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