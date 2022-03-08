<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Patients List <small></small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
          <div class="row">
            <div class="col-md-12">
                <table id="datatable" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Sno</th>
                      <th>Patient ID</th>
                      <th>Patient Name</th>
                      
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Gender</th>
                      <th>Maritial Status</th>
                      <th>Height</th>
                      <th>Weight</th>
					   <th>Blood Group</th>
					  
                    </tr>
                  </thead>


                  <tbody>
                    <?php $sno =1; if ($doctors_data) {
                              foreach ($doctors_data as $key => $udvalue) { ?>
                    <tr>
                      <td><?php echo $sno; ?></td>
                      <td><?php echo $udvalue['patient_id']; ?></td>
                      <td><?php echo $udvalue['patient_name']; ?></td>
                      <td><?php echo $udvalue['email']; ?></td>
                      <td><?php echo $udvalue['phone_number']; ?></td>
                      <td><?php echo $udvalue['gender']; ?></td>
                      <td><?php echo $udvalue['maritial_status']; ?></td>
                      <td><?php echo $udvalue['height']; ?></td>
					  <td><?php echo $udvalue['weight']; ?></td>
					    <td><?php echo $udvalue['blood_group']; ?></td>
						   
                      <td>
                        <form method="post" action="<?php echo base_url(); ?>patients/find_user">
                          <input type="hidden" name="user_id" value="<?php echo $udvalue['patient_id']; ?>">
                        <button type="submit" class="btn btn-info">View</button>

                        </form>
                      </td>
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


