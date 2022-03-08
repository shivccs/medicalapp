<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Users List <small>List of all registered users</small></h2>
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
                      <th>User ID</th>
                      <th>User Name</th>
                      <th>Role Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Added By</th>
                      <th>Added On</th>
                      <th>Status</th>
                      <th>View</th>
                    </tr>
                  </thead>


                  <tbody>
                    <?php $sno =1; if ($users_data) {
                              foreach ($users_data as $key => $udvalue) { ?>
                    <tr>
                      <td><?php echo $sno; ?></td>
                      <td><?php echo $udvalue['user_id']; ?></td>
                      <td><?php echo $udvalue['first_name'].' '.$udvalue['last_name']; ?></td>
                      <td><?php echo $udvalue['role_name']; ?></td>
                      <td><?php echo $udvalue['email']; ?></td>
                      <td><?php echo $udvalue['phone']; ?></td>
                      <td><?php echo $udvalue['added_by']; ?></td>
                      <td><?php echo $udvalue['added_on']; ?></td>
                      <td>
                        <?php
                            if ($udvalue['is_active']) {
                                echo "Active";
                            }else{
                                echo "Not Active";
                            }


                        ?>
                      </td>
                      <td>
                        <form method="post" action="<?php echo base_url(); ?>users_list/find_user">
                          <input type="hidden" name="user_id" value="<?php echo $udvalue['user_id']; ?>">
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


