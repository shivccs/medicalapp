<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Surgeries  <small></small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
			
            <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>add_surgery/add">
             
			  <div class="title_left">
               
                <hr>
              </div>
              <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-12">
                  <label class="control-label" for="first-name">Surgery  Name <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" required="required"  name="allergy" id="name" class="form-control" required>
				  </div>
				
				<div class="col-md-2 col-sm-3 col-xs-12">
                  <label class="control-label" for="first-name">Active <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input name="flag"  type="checkbox" id="flag" name="flag" value="1" checked>
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