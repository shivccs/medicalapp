<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Pharmacy Leaf Size <small>Leaf size & unit list</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>pharmacy_leaf/new">
              

              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Leaf Name</label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" required="required" name="leaf_name" class="form-control">
                </div> 
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Unit Value</label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="number" required="required" name="unit_val" class="form-control">
                </div> 
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <button type="submit" class="btn btn-success">Create</button>
                </div>
              </div>
              <div class="row">                
                <div class="col-md-2 col-sm-2 col-xs-12">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
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

            <div class="ln_solid"></div>
              <br>
            <div class="row">
              <div class="col-md-12">
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Sno</th>
                        <th>Leaf Name</th>
                        <th>Leaf Unit Size</th>
                        <th>Created By</th>
                        <th>Created On</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>


                    <tbody>
                      <?php $sno =1; if ($leafs) {
                                foreach ($leafs as $key => $urvalue) { ?>
                      <tr>
                        <td><?php echo $sno; ?></td>
                        <td><?php echo $urvalue['leaf_name']; ?></td>
                        <td><?php echo $urvalue['unit']; ?></td>
                        <td><?php echo $urvalue['added_by']; ?></td>
                        <td><?php echo $urvalue['created_on']; ?></td>
                        <td>
                        <?php
                            if ($urvalue['status']) {
                                echo "Active";
                            }else{
                                echo "Not Active";
                            }


                        ?>
                       </td>
                        <td>
                          <a href="#" class="text-info">
                            <i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i>
                          </a>
                        </td>
                        <td>
                          <a href="#" class="text-danger">
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