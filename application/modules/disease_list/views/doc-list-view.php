<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Cronic Disease List </h2>
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
                      <th>Cronic Disease ID</th>
                      <th>Cronic Disease Name</th>
                     
                      <th>Added By</th>
                      <th>Added On</th>
                      <th>Status</th>
					            <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>


                  <tbody>
                    <?php $sno =1; if ($doctors_data) {
                              foreach ($doctors_data as $key => $udvalue) { ?>
                    <tr>
                      <td><?php echo $sno; ?></td>
                      <td><?php echo $udvalue['cronic_disease_id']; ?></td>
                      <td><?php echo $udvalue['cronic_disease_name']; ?></td>
                       <td><?php echo $udvalue['created_by']; ?></td>
                      <td><?php echo $udvalue['created_on']; ?></td>
                      <td>
                        <?php
                          if ($udvalue['status']) {
                              echo "Active";
                          }else{
                              echo "Not Active";
                          }
                        ?>
                      </td>
					            <td>
                        <a href="<?php echo base_url(); ?>template/disease_edit/<?php echo $udvalue['cronic_disease_id']; ?>" class="text-info">
                          <i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i>
                        </a>
                      </td>
                      <td>
                        <a href="<?php echo base_url(); ?>template/disease_delete/<?php echo $udvalue['cronic_disease_id']; ?>" class="text-danger">
                          <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                        </a>
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


