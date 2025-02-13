@extends('admin.admin_dashboard')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Product List</h4>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProductModal">New Product</button>
                    </div>
                    <div class="input-group" style="width: 300px;">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search...">
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Code</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Featured</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="productTableBody">
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->product_code }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->category_name }}</td>
                                    <td>${{ number_format($item->price, 2) }}</td>
                                    <td>{{ $item->stock_quantity }}</td>
                                    <td>
                                        @if($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="Product Image" style="width: 40px; height: 40px; object-fit: cover;">
                                        @else
                                            <span>No Image</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->is_featured)
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-secondary">No</span>
                                        @endif
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <button class="btn btn-sm btn-primary me-2 edit-btn" data-id="{{ $item->id }}" data-product_code="{{ $item->product_code }}" data-name="{{ $item->product_name }}" data-price="{{ $item->price }}" data-category="{{ $item->category_name }}" data-stock="{{ $item->stock_quantity }}" data-description="{{ $item->description }}" data-image="{{ $item->image }}" data-bs-toggle="modal" data-bs-target="#editProductModal">Edit</button>
                                        <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#deleteProductModal">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="text-muted">
                        Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} products
                    </div>
                    <div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $products->lastPage(); $i++)
                                    <li class="page-item {{ $products->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.products.create')
@include('admin.products.edit')
@include('admin.products.destroy')

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Real-time search functionality
        const searchInput = document.getElementById('searchInput');
        const productTableBody = document.getElementById('productTableBody');
        const rows = productTableBody.getElementsByTagName('tr');

        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value.toLowerCase();

            Array.from(rows).forEach(function (row) {
                const rowData = row.textContent.toLowerCase();
                if (rowData.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Edit Button
        let editBtns = document.querySelectorAll('.edit-btn');
        editBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                let id = this.getAttribute('data-id');
                let productCode = this.getAttribute('data-product_code');
                let productName = this.getAttribute('data-name');
                let price = this.getAttribute('data-price');
                let category = this.getAttribute('data-category');
                let stock = this.getAttribute('data-stock');
                let description = this.getAttribute('data-description');
                let image = this.getAttribute('data-image');

                // Populate the Edit modal fields
                document.getElementById('editProductCode').value = productCode;
                document.getElementById('editProductName').value = productName;
                document.getElementById('editProductPrice').value = price;
                document.getElementById('editProductCategory').value = category;
                document.getElementById('editProductStock').value = stock;
                document.getElementById('editProductDescription').value = description;
                if (image) {
                    document.getElementById('editProductImagePreview').src = '/storage/' + image;
                    document.getElementById('editProductImagePreview').style.display = 'block';
                }

                // Set the form action
                document.getElementById('editProductForm').action = '/products/' + id;
            });
        });

        // Delete Button
        let deleteBtns = document.querySelectorAll('.delete-btn');
        deleteBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                let id = this.getAttribute('data-id');

                // Set the form action for the delete modal
                document.getElementById('deleteProductId').value = id;
                document.getElementById('deleteProductForm').action = '/products/' + id;
            });
        });
    });
</script>
@endsection
