<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Doctor Profile <small>Doctor complete information</small></h2>            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
              <div class="profile_img">
                <div id="crop-avatar">
                  <?php if ($doc_img) { ?>
                  <!-- Current avatar -->
                  <img class="img-responsive avatar-view" src="<?php echo base_url().$doc_img['path'].'/'.$doc_img['file_name']; ?>" alt="Avatar" title="Change the avatar">
                <?php }else{ ?>

                  <img class="img-responsive avatar-view" src="<?php echo base_url(); ?>assets/images/user.png" alt="Avatar" title="Change the avatar">

                <?php } ?>

                </div>
              </div>

              <h3><?php echo $doc_data['first_name'].' '.$doc_data['last_name']; ?></h3>

              <ul class="list-unstyled user_data">
                <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $doc_data['state_name'].', '.$doc_data['city_name'].', '.$doc_data['pincode']; ?>
                </li>

                <li>
                  <i class="fa fa-briefcase user-profile-icon"></i> <?php echo $doc_data['category_name']; ?>
                </li>

                <li class="m-top-xs">
                  <i class="fa fa-web user-profile-icon"></i>
                  <?php echo $doc_data['email']; ?>
                </li>
                <li class="m-top-xs">
                  <i class="fa fa-phone user-profile-icon"></i>
                  <?php echo $doc_data['phone']; ?>
                </li>
              </ul>
   
              <button  value="<?php echo $doc_data['doctor_id']; ?>"  class="btn btn-success rb"><i class="fa fa-edit m-right-xs"></i>Edit Profile</button>
              <br />

              <!-- start skills -->
              
              
              <!-- end of skills -->

            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">

              <div class="profile_title">
                <div class="col-md-6">
                  <h2>Dcotor Activity Report</h2>
                </div>
                <div class="col-md-6">
                  
                </div>
              </div>

              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                  </li>
                  <li role="presentation" ><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
                  </li>
                  
                  
                </ul>
                <div id="myTabContent" class="tab-content">
                 
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">


                  </div>
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="profile-tab">
				
 <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>doctor_registration/register">
  <div class="panel panel-info" style="margin: 1em;">
                    <div style="background-color:#2A3F54; color:white;" class="panel-heading">
                        <h3 class="panel-title">Basic Information</</h3>
                    </div>
					</div>
             
              <div class="row">
			   <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">First Name</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $doc_data['first_name']; ?>
                    </div>
                </div>
				</div>
				  <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Last Name</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $doc_data['last_name']; ?>
                    </div>
                </div>
				</div>
				  <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Father Name</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $doc_data['father_name']; ?>
                    </div>
                </div>
				</div>
				  <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Gender</h3>
                    </div>
                    <div class="panel-body">
                        <?php if($doc_data['gender']=='m') { echo "Male";} if($doc_data['gender']=='f') { echo "FeMale";} if($doc_data['gender']=='o') { echo "Other";}   ?>
                    </div>
                </div>
				</div>
				  <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Email</h3>
                    </div>
                    <div class="panel-body">
					<?php echo $doc_data['email']; ?>
                    </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Phone</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $doc_data['phone']; ?>
				  </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">DOB</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $doc_data['dob']; ?>
				  </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Category</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $doc_data['category_name']; ?>
				  </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Address</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $doc_data['address']; ?>
				  </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">State</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $doc_data['state_name']; ?>
				  </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">City</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $doc_data['city_name']; ?>
				  </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pincode</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $doc_data['pincode']; ?>
				  </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">:Latitude</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $doc_data['latitude']; ?>
				  </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Longitude</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $doc_data['longitude']; ?>
				  </div>
                </div>
				</div>
               </div>

             
              
             

            

              <br>
			  <div style="background-color:#2A3F54;" class="panel panel-info" style="margin: 1em;">
                    <div style="background-color:#2A3F54; color:white;"  class="panel-heading">
                        <h3 class="panel-title">Professional Information</</h3>
                    </div>
					</div>
             
              <div class="row">
			   <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registration Number</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $doc_data['regi']; ?>
				  </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Medical Council</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $doc_data['council']; ?>
				  </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Certification Year</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $doc_data['passout']; ?>
				  </div>
                </div>
				</div>
				 <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Medical Degree</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $doc_data['degree']; ?>
				  </div>
                </div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Passout Year</h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $doc_data['passout']; ?>
				  </div>
                </div>
				</div>
			  
			  <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Medical College </h3>
                    </div>
                    <div class="panel-body">
                  <?php echo $doc_data['collage']; ?>
				  </div>
                </div>
				</div>
			  
			  <div class="col-md-4 col-sm-4 col-xs-12">
			   <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Experience</h3>
                    </div>
                    <div class="panel-body">
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
      </div>
    </div>
  </div>
</div>
<div class="container">
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Doctor</h4>
        </div>
        <div class="modal-body">
          <form>
		  <input type="text" id="rsb"  >
		  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<script>
$(document).ready(function(){
	$(document).on('click', '.rb', function(){
		
		var id=$(this).val();
		 $.ajax(
			{  
				type: "POST",  
				url: "Doctor_profile/save", 
				data: dataString, 
				cache: false, 
				success: function(result)
				{	
				    alert(result);
					var result = eval('('+result+')'); 

          $("#category").val(result.category);
          $("#slno").val(result.id);

          if(result.flag == "1")
          {
          	$("#flag"). prop("checked", true);
          }
          else
          {
          	$("#flag"). prop("checked", false);
          }

          $("#img1").val(result.img);
          if(result.img==""){}
         	else
         	{
         		$("#imgdisp").html("<img id='myImg' src='images/"+result.img+"' style='width:100px;height:70px;'/>")
         	}
        }
			});
	});
});
</script>

<style>
input:read-only {
  background-color: yellow;
}
</style>