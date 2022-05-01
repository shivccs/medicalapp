<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-4">
            <div class="border-bottom text-center pb-4">
              <?php if ($pimage) { ?>
                <!-- Current avatar -->
                <img class="img-lg rounded-circle mb-3" src="<?php echo base_url().$pimage['path'].'/'.$pimage['file_name']; ?>" alt="Avatar" title="Change the avatar">
                <?php }else{ ?>

                <img class="img-lg rounded-circle mb-3" src="<?php echo base_url(); ?>assets/images/user.png" alt="Avatar" title="Change the avatar">

              <?php } ?>

              <div class="d-flex justify-content-center mb-3">
                <form method="post" enctype="multipart/form-data"  action="<?php echo base_url(); ?>patient_profile/profile_image">
                  <input  type="hidden" name="user_id" value="<?php echo $pdata['user_id']; ?>" required>
                  <input class="form-control mb-2"  type="file" name="file"  required>
                  <input type="submit" name="upload" class="btn btn-success" value="upload">
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

