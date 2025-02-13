<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" class="form-inline" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 row">
                        <div class="col-md-12">
                            <label for="editProductCode" class="form-label">Product Code</label>
                            <input id="editProductCode" class="form-control" name="product_code" type="text" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="editProductName" class="form-label">Product Name</label>
                            <input id="editProductName" class="form-control" name="product_name" type="text">
                        </div>
                        <div class="col-md-6">
                            <label for="editProductPrice" class="form-label">Price</label>
                            <input id="editProductPrice" class="form-control" name="price" type="number" step="0.01">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="form-group col-md-6">
                            <label for="editProductCategory">Category</label>
                            <select id="editProductCategory" class="form-control" name="category_name">
                                <option value="Electronics">Electronics</option>
                                <option value="Clothing">Clothing</option>
                                <option value="Home Appliances">Home Appliances</option>
                                <option value="Books">Books</option>
                                <option value="Toys">Toys</option>
                                <option value="Furniture">Furniture</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="editProductStock">Stock Quantity</label>
                            <input type="number" class="form-control" id="editProductStock" name="stock_quantity">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="form-group col-md-12">
                            <label for="editProductDescription">Description</label>
                            <textarea class="form-control" id="editProductDescription" name="description" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="form-group col-md-12">
                            <label for="editProductImage">Product Image</label>
                            <input type="file" class="form-control" id="editProductImage" name="image">
                            <img id="editProductImagePreview" src="" alt="Product Image" width="150" style="display: none;">
                        </div>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Update Product">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
