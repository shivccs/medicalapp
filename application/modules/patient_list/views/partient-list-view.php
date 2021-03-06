<style type="text/css">
  .table thead th,.table tbody td{font-size: 0.8rem}
  .table th,.table td{padding: 0.75rem !important;}
</style>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <h2>Patient List <small>(List of all registered patients)</small></h2>
  </div>
</div>
<div class="card mt-3">
  <div class="card-body">
    <div class="table-responsive">
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr class="text-sm">
            <th>Sno</th>
            <th>Patient ID</th>
            <th>Patient Name</th>
            <th>Mobile</th>
            <th>Gender</th>
            <th>Profile</th>
          </tr>
        </thead>


        <tbody>
          <?php $sno =1; if ($patient_data) {
                    foreach ($patient_data as $key => $udvalue) { ?>
          <tr>
            <td><?php echo $sno; ?></td>
            <td><?php echo $udvalue['user_id']; ?></td>
            <td><?php echo $udvalue['first_name'].' '.$udvalue['last_name']; ?></td>
            <td><?php echo $udvalue['phone']; ?></td>
            <td><?php echo $udvalue['gender']; ?></td>     
            <td>
              <form method="post" action="<?php echo base_url(); ?>patient_list/find_user">
                <input type="hidden" name="user_id" value="<?php echo $udvalue['user_id']; ?>">
              <button type="submit" class="btn btn-info btn-sm">View</button>

              </form>
            </td>
          </tr>
          <?php $sno++; }} ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


