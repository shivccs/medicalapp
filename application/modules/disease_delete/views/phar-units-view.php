<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Medical Item <small></small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
			
            <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>item_edit/register">
              <?php  foreach ($rec as $row) {    ?>
			  <div class="title_left">
                <small>Details</small>
                <hr>
              </div>
              <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-12">
                  <label class="control-label" for="first-name">Item Name <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" required="required" value="<?php echo $row->medical_item_name; ?>" name="name" id="name" class="form-control">
                </div>
				 <div class="col-md-2 col-sm-3 col-xs-12">
                  <label class="control-label" for="first-name">Category <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control" name="category" required>
                    <option value="">Select Category</option>
                    <?php if ($category) { 
                          foreach ($category as $key => $catvalue) { ?>
                    <option <?php  if($row->med_cat_id == $catvalue['doctor_category_id']) { echo "selected"; } ?> value="<?php echo $catvalue['doctor_category_id']; ?>"><?php echo $catvalue['category_name']; ?></option>

                  <?php }} ?>
                  </select>
                </div> 

               
              </div>
              <br>

   <div class="row">
               
				 <div class="col-md-2 col-sm-3 col-xs-12">
                  <label class="control-label" for="first-name">Manufcture <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control" name="manufacture" required>
                    <option value="">Select Manufactuer
					</option>
                    <?php if ($manufacture) { 
                          foreach ($manufacture as $key => $catvalue) { ?>
                    <option <?php  if($row->manufacturer_id == $catvalue['manufacturer_id']) { echo "selected"; } ?> value="<?php echo $catvalue['manufacturer_id']; ?>"><?php echo $catvalue['manufacturer_name']; ?></option>

                  <?php }} ?>
                  </select>
                </div> 
				 <div class="col-md-2 col-sm-3 col-xs-12">
                  <label class="control-label" for="first-name">Unit <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control" name="unit" required>
                    <option value="">Select Unit
					</option>
                    <?php if ($unit) { 
                          foreach ($unit as $key => $catvalue) { ?>
                    <option <?php  if($row->unit == $catvalue['unit_id']) { echo "selected"; } ?> value="<?php echo $catvalue['unit_id']; ?>"><?php echo $catvalue['unit_name']; ?></option>

                  <?php }} ?>
                  </select>
                </div> 

               
              </div>
			  <br />
               <div class="row">
                
				 <div class="col-md-2 col-sm-3 col-xs-12">
                  <label class="control-label" for="first-name">Leaf <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <select class="form-control" name="leaf" required>
                    <option value="">Select Leaf
					</option>
                    <?php if ($leaf) { 
                          foreach ($leaf as $key => $catvalue) { ?>
                    <option <?php  if($row->medical_leaf_id == $catvalue['leaf_id']) { echo "selected"; } ?> value="<?php echo $catvalue['leaf_id']; ?>"><?php echo $catvalue['leaf_name']; ?></option>

                  <?php }} ?>
                  </select>
                </div> 
				

               
              </div>
			  <br />
			    <div class="row">
               
				 <div class="col-md-2 col-sm-3 col-xs-12">
                  <label class="control-label" for="first-name">Price <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
               <input type="text" class="form-control" value="<?php echo $row->price; ?>" onkeypress="allowNumbersOnly(event)" name="price" required>
                </div> 
				 <div class="col-md-2 col-sm-3 col-xs-12">
                  <label class="control-label" for="first-name">Quantity <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="text" class="form-control" value="<?php echo $row->aviable_qty; ?>" name="quantity"  onkeypress="allowNumbersOnly(event)" required>
                </div> 
<script>
function allowNumbersOnly(e) {
    var code = (e.which) ? e.which : e.keyCode;
    if (code > 31 && (code < 48 || code > 57)) {
        e.preventDefault();
    }
}
</script>
               
              </div>
			  <br />
			    <div class="row">
				 <div class="col-md-2 col-sm-3 col-xs-12">
                  <label class="control-label" for="first-name">Description <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                <textarea class="form-control" name="detail" required><?php echo $row->description; ?></textarea>
                </div> 
                <div class="col-md-2 col-sm-3 col-xs-12">
                  <label class="control-label" for="first-name">Expiry <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                 <input type="date" class="form-control" value="<?php echo $row->expiry_date; ?>" name="expiry" required>
				  <input type="hidden" class="form-control" value="<?php echo $row->medical_item_id; ?>" name="id" required>
                </div> 
				
				 

               
              </div>
			   <br />
			    <div class="row">
				 <div class="col-md-2 col-sm-3 col-xs-12">
                  <label class="control-label" for="first-name">Image <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="file" class="form-control" name="file" >
                </div> 
				<div class="col-md-2 col-sm-3 col-xs-12">
                  <label class="control-label" for="first-name">Active <span class="required">*</span>
                  </label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input name="flag" <?php  if($row->status == 1) { echo "selected"; } ?> type="checkbox" id="flag" name="flag" value="1" >
                </div> 
                
				
				 

               
              </div>
             

           
             
			  <?php }  ?>  
             

           

            

            



                       
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