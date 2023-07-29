
<div class="content-wrapper show">
        <!-- Add the content to display the product details -->
        <div class="row">
          <div class="col-md-6 pro-img">
          <img src="<?php echo base_url($product_data['image']); ?>" alt="<?php echo $product_data['name']; ?>" width="200">
          </div>
          <div class="col-md-6">
          <h4><?php echo $product_data['name']; ?></h4>
        <p>Unit: <?php echo $product_data['sku']; ?></p>
        <p>Price: <?php echo $product_data['price']; ?></p>
        <p>Qty: <?php echo $product_data['qty']; ?></p>
          </div>
        </div>
        

</div>
