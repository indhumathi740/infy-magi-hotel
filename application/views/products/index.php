<style>
  .productbtn{
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
      <small>Products</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Products</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
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

        <?php if(in_array('createProduct', $user_permission)): ?>
          <div class="productbtn"><a href="<?php echo base_url('products/create') ?>" class="btn btn-primary">Add Product</a></div>
          <br /> <br />
        <?php endif; ?>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Products</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Image</th>
                <th>Unit</th>
                <th>Product Name</th>
                <th> <span class="popover-icon" data-toggle="popover" data-content="This price for per unit">Price</span>
</th>
  
                <th>Qty</th>

                
                <!-- <th>Store</th> -->
                <th>Availability</th>
                 <?php if(in_array('updateProduct', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
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

<?php if(in_array('deleteProduct', $user_permission)): ?>
<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Product</h4>
        
      </div>

      <form role="form" action="<?php echo base_url('products/remove') ?>" method="post" id="removeForm">
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

  <!-- Modal -->
  <div class="modal fade modal-xl" id="img-modal">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body img-modal-body">
          <img class="modal-img img-fluid" alt="">
        </div>
      </div>
    </div>
  </div>
  <script>
    var img = document.querySelectorAll(".gal-img");
    var modal = document.querySelector(".modal-img");
    var modal = document.querySelector(".test");
    img.forEach( (imgSrc) => {
        imgSrc.addEventListener("click", ()=>{
          var curSrc = imgSrc.getAttribute('src');
          modal.setAttribute("src", curSrc);
        });
    });

  </script>



<script type="text/javascript">
var manageTable;
var base_url = "<?php echo base_url(); ?>";

$(document).ready(function() {

  $("#mainProductNav").addClass('active');

  // initialize the datatable 
  manageTable = $('#manageTable').DataTable({
    'ajax': base_url + 'products/fetchProductData',
    'order': []
  });

});

// remove functions 
function removeFunc(id)
{
  if(id) {
    $("#removeForm").on('submit', function() {

      var form = $(this);

      // remove the text-danger
      $(".text-danger").remove();

      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: { product_id:id }, 
        dataType: 'json',
        success:function(response) {

          manageTable.ajax.reload(null, false); 

          if(response.success === true) {
            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
            '</div>');

            // hide the modal
            $("#removeModal").modal('hide');

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


</script>
<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="viewModalContent">
            <!-- Modal content will be loaded here -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // Handle click event of View button
        $(document).on('click', '.view-product', function() {
            var productId = $(this).data('product-id');

            // Load the modal content using AJAX
            $.ajax({
                url: '<?php echo base_url("products/view_product/") ?>' + productId,
                type: 'GET',
                dataType: 'html',
                success: function(response) {
                    // Display the modal with the fetched content
                    $("#viewModalContent").html(response);
                    $("#viewModal").modal('show');
                },
                error: function(xhr, status, error) {
                    alert('Error fetching product details.');
                }
            });
        });
    });
</script>
<script type="text/javascript">
  // Initialize popovers
  $(function () {
    $('[data-toggle="popover"]').popover();
  });
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
  // Initialize popovers
  $(function () {
    $('[data-toggle="popover"]').popover();
  });
</script>
<style>
  .popover-icon{
    width: 100px;
    height: 100px;
  }
</style>