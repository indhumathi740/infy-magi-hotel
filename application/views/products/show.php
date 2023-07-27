<!-- view_product.php -->

<div class="modal fade" id="viewProductModal" tabindex="-1" role="dialog" aria-labelledby="viewProductModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewProductModalLabel">Product Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Display product details here -->
        <div id="productDetails"></div>
      </div>
    </div>
  </div>
</div>
<!-- Modal content to display the product details -->
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Product Details</h4>
    </div>
    <div class="modal-body">
        <!-- Add the content to display the product details -->
        <h4><?php echo $product_data['name']; ?></h4>
        <p>SKU: <?php echo $product_data['sku']; ?></p>
        <p>Price: <?php echo $product_data['price']; ?></p>
        <!-- Add other product details as needed -->
    </div>
</div>

<style>
.modal-content{
  text-align: center;
}
</style>