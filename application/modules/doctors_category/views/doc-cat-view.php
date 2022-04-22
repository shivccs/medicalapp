<div class="row">
  <div class="col-md-6 col-12">
    <h2>Doctors Category <small>(Doctors category list)</small></h2>
  </div>
  <div class="col-md-6 col-12 text-right">
    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
      + Add Category
    </button>
  </div>
</div>
<div class="card mt-3">
  <div class="card-body">
    <div class="table-responsive">
      <table id="datatable" class="table table-striped table-bordered table-sm">
        <thead>
          <tr>
            <th>Sno</th>
            <th>Category Name</th>
            <th>Information</th>
            <th>Image</th>
            <th>Status</th>
            <th>Diseases</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>


        <tbody>
          <?php $sno =1; if ($units) {
                    foreach ($units as $key => $urvalue) { ?>
          <tr>
            <td><?php echo $sno; ?></td>
            <td><?php echo $urvalue['category_name']; ?></td>
            <td><?php echo $urvalue['info']; ?></td>
            <td>
              <a href="<?php echo base_url().$urvalue['path'].'/'.$urvalue['file_name']; ?>" target="_blank">
                <img width="50" height="50" class="img-responsive" src="<?php echo base_url().$urvalue['path'].'/'.$urvalue['file_name']; ?>">
              </a>

            </td>
            <td>
            <?php
                if ($urvalue['status']) {
                    echo "Active";
                }else{
                    echo "Not Active";
                }


            ?>
           </td>
            <td></td>
            <td>
              <a href="<?php echo base_url('category_edit/edit/'.$urvalue['status']) ?>" class="text-info">
                <i class="mdi mdi-grease-pencil" aria-hidden="true"></i>
              </a>
            </td>
            <td>
              <a href="#" class="text-danger">
                <i class="mdi mdi-cup" aria-hidden="true"></i>
              </a>
            </td>                        
          </tr>
          <?php $sno++; }} ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
        

<!-- Create Category Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('doctors_category/new'); ?>
          <div class="row">
            <div class="col-md-6 col-12 form-group">
              <input type="text" required="required" name="category" class="form-control" placeholder="Category Name">
            </div>
            <div class="col-md-6 col-sm-6 col-12 form-group">
              <input type="text" required="required" name="info" class="form-control" placeholder="Category Information">
            </div>
            <div class="col-12">
              <div class="form-group">
                <input type="file" name="category_img" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                  </span>
                </div>
                <span>*Select image (jpg, jpeg, png) with in 2 mb of size</span>
              </div>
            </div>
          </div>
          <div class="row">
            <?php foreach ($diseases as $key => $value) { ?>
              <div class="col-md-4 col-12 form-group">
                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    
                    <?php echo $value['disease_name']; ?>
                  <i class="input-helper"></i></label>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="row text-center">
            <div class="col-12">
              <button type="submit" class="btn btn-info">Create</button>
            </div>
            <div class="col-12">
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


<!-- Modal -->
<div id="add_money_md" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>add_accounts/add_money">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="add_money_name">Add Money to Bank</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-12">
            <input type="hidden" required="required" name="receiver_id" id="receiver_id" class="form-control">
            <input type="number" step="any" required="required" name="amount" class="form-control">
            <span>Enter Amount</span>
          </div>
          
          <div class="col-md-2 col-sm-2 col-xs-12">
            <label class="control-label" for="first-name">Bank Name</label>
          </div>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <select class="form-control" name="bank">
              <option value="self">Self Or Select Bank</option>
              <?php if ($bank_list) {
                      foreach ($bank_list as $key => $blvalue) { ?>

              <option value="<?php echo $blvalue['bank_account_id']; ?>" ><?php echo $blvalue['bank_name'].' ('.$blvalue['acno'].' )'; ?></option>
            <?php }} ?>
            </select>
            <span></span>
          </div>         
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info">Add Money</button>
      </div>
    </div>
  </form>
  </div>
</div>



<script type="text/javascript">
  function add_money(bank_id, bank_name){
      $('#add_money_name').text('Add Money to '+bank_name);
      if (bank_id) {
        $('#add_money_md').modal('show');
        $('#receiver_id').val(bank_id);
        console.log(bank_id);
      }
  }//end of function add_money
</script>