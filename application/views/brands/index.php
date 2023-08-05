<style>
  .stockbtn{
    display: flex;
    justify-content: end;
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Stocks</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Stocks</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
  <div id="currentDate"></div>
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif($this->session->flashdata('error')): ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <?php if(in_array('createBrand', $user_permission)): ?>
          <div class="stockbtn"><button class="btn btn-primary" data-toggle="modal" data-target="#addBrandModal">Add Stock</button></div>
          <br /> <br />
        <?php endif; ?>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Stock</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
              <!-- <th>Order ID</th> -->
              <th>Date and Time</th>
                <th>Branch Name</th>
                <!-- <th>Product Name</th> -->
                <th>Qty</th>
                <th>Status</th>
                <?php if(in_array('updateBrand', $user_permission) || in_array('deleteBrand', $user_permission)): ?>
                  <th>Action</th>
                <?php endif; ?>
              </tr>
              </thead>

            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php if(in_array('createBrand', $user_permission)): ?>
<!-- create brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addBrandModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Product</h4>
      </div>

      <form role="form" action="<?php echo base_url('brands/create') ?>" method="post" id="createBrandForm">

        <div class="modal-body">
        <!-- <div class="form-group">
  <label for="order_id">Order ID</label>
  <select class="form-control" id="order_id" name="order_id">
    <option value="">Select an order</option>
    <?php foreach ($orders as $order): ?>
      <option value="<?php echo $order['id']; ?>"><?php echo $order['id']; ?></option>
    <?php endforeach; ?>
  </select>
</div> -->

       <div class="form-group">
  <label for="order_id">Branch Name</label>
  <select class="form-control" id="store_name" name="store_name">
    <option value="">Select an Branch</option>
    <?php foreach ($stores as $store): ?>
      <option value="<?php echo $store['name']; ?>"><?php echo $store['name']; ?></option>
    <?php endforeach; ?>
  </select>
</div> 

<!-- 
          <div class="form-group">
            <label for="brand_name">Product Name</label>
            <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter Product name" autocomplete="off">
          </div> -->
          <div class="form-group">
            <label for="brand_name">Qty</label>
            <input type="text" class="form-control" id="qty" name="qty" placeholder="Enter qty" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="active">Status</label>
            <select class="form-control" id="active" name="active">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>

<?php if(in_array('updateBrand', $user_permission)): ?>
<!-- edit brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editBrandModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Product</h4>
      </div>

      <form role="form" action="<?php echo base_url('brands/update') ?>" method="post" id="updateBrandForm">

        <div class="modal-body">
          <div id="messages"></div>
          <!-- <div class="form-group">
  <label for="order_id">Order ID</label>
  <select class="form-control" id="edit_order_id" name="edit_order_id">
    <option value="">Select an order</option>
    <?php foreach ($orders as $order): ?>
      <option value="<?php echo $order['id']; ?>"><?php echo $order['id']; ?></option>
    <?php endforeach; ?>
  </select>
</div> -->

<div class="form-group">
  <label for="order_id">Branch Name</label>
  <select class="form-control" id="edit_store_name" name="edit_store_name">
    <option value="">Select an Branch</option>
    <?php foreach ($stores as $store): ?>
      <option value="<?php echo $store['name']; ?>"><?php echo $store['name']; ?></option>
    <?php endforeach; ?>
  </select>
</div> 

          <!-- <div class="form-group">
            <label for="edit_brand_name">Product Name</label>
            <input type="text" class="form-control" id="edit_brand_name" name="edit_brand_name" placeholder="Enter Product name" autocomplete="off">
          </div> -->
          <div class="form-group">
            <label for="edit_brand_name">Qty</label>
            <input type="text" class="form-control" id="edit_qty" name="edit_qty" placeholder="Enter qty" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="edit_active">Status</label>
            <select class="form-control" id="edit_active" name="edit_active">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>

<?php if(in_array('deleteBrand', $user_permission)): ?>
<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeBrandModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Brand</h4>
      </div>

      <form role="form" action="<?php echo base_url('brands/remove') ?>" method="post" id="removeBrandForm">
        <div class="modal-body">
          <p>Do you really want to remove?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif; ?>



<script type="text/javascript">
var manageTable;

$(document).ready(function() {

  $("#brandNav").addClass('active');

  // initialize the datatable 
  manageTable = $('#manageTable').DataTable({
    'ajax': 'fetchBrandData',
    'order': []
  });

  // submit the create from 
  $("#createBrandForm").unbind('submit').on('submit', function() {
    var form = $(this);

    // remove the text-danger
    $(".text-danger").remove();

    $.ajax({
      url: form.attr('action'),
      type: form.attr('method'),
      data: form.serialize(), // /converting the form data into array and sending it to server
      dataType: 'json',
      success:function(response) {

        manageTable.ajax.reload(null, false); 

        if(response.success === true) {
          $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
            '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
          '</div>');


          // hide the modal
          $("#addBrandModal").modal('hide');

          // reset the form
          $("#createBrandForm")[0].reset();
          $("#createBrandForm .form-group").removeClass('has-error').removeClass('has-success');

        } else {

          if(response.messages instanceof Object) {
            $.each(response.messages, function(index, value) {
              var id = $("#"+index);

              id.closest('.form-group')
              .removeClass('has-error')
              .removeClass('has-success')
              .addClass(value.length > 0 ? 'has-error' : 'has-success');
              
              id.after(value);

            });
          } else {
            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
            '</div>');
          }
        }
      }
    }); 

    return false;
  });


});

function editBrand(id)
{ 
  $.ajax({
    url: 'fetchBrandDataById/'+id,
    type: 'post',
    dataType: 'json',
    success:function(response) {

      $("#edit_brand_name").val(response.name);
      $("#edit_active").val(response.active);

      // submit the edit from 
      $("#updateBrandForm").unbind('submit').bind('submit', function() {
        var form = $(this);

        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action') + '/' + id,
          type: form.attr('method'),
          data: form.serialize(), // /converting the form data into array and sending it to server
          dataType: 'json',
          success:function(response) {

            manageTable.ajax.reload(null, false); 

            if(response.success === true) {
              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
              '</div>');


              // hide the modal
              $("#editBrandModal").modal('hide');
              // reset the form 
              $("#updateBrandForm .form-group").removeClass('has-error').removeClass('has-success');

            } else {

              if(response.messages instanceof Object) {
                $.each(response.messages, function(index, value) {
                  var id = $("#"+index);

                  id.closest('.form-group')
                  .removeClass('has-error')
                  .removeClass('has-success')
                  .addClass(value.length > 0 ? 'has-error' : 'has-success');
                  
                  id.after(value);

                });
              } else {
                $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                '</div>');
              }
            }
          }
        }); 

        return false;
      });

    }
  });
}

function removeBrand(id)
{
  if(id) {
    $("#removeBrandForm").on('submit', function() {

      var form = $(this);

      // remove the text-danger
      $(".text-danger").remove();

      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: { brand_id:id }, 
        dataType: 'json',
        success:function(response) {

          manageTable.ajax.reload(null, false); 

          if(response.success === true) {
            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
            '</div>');

            // hide the modal
            $("#removeBrandModal").modal('hide');

          } else {

            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
            '</div>'); 
          }
        }
      }); 

      return false;
    });
  }
}
function updateDateTime() {
    // Get the current date
    const now = new Date();

    // Get the date part in YYYY-MM-DD format
    const formattedDate = now.toISOString().slice(0, 10);

    // Update the HTML element with the formatted date
    document.getElementById('currentDate').textContent = formattedDate;
  }

  // Update the date immediately when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    updateDateTime();

    // Update the date every second (1000 milliseconds)
    setInterval(updateDateTime, 1000);
  });

</script>
