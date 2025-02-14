@extends('frontend.front_app')

@section('content')
    <div style="margin-top: 50px;"></div>

    <!-- New Arrivals Section Start -->
    <section id="new-arrivals" class="new-arrivals">
        <div class="container">
            <div class="row">
                <!-- Filter Section (left side) -->
                <div class="col-md-3">
                    <div class="product-filter">
                        <h4 class="filter-title">Filter Products</h4>
                        <form action="{{ route('frontend.filter_products') }}" method="GET" id="filter-form">
                            <!-- Search Bar -->
                            <div class="filter-item">
                                <label for="search">Search</label>
                                <div class="input-group">
                                    <input type="text" name="search" id="search" class="form-control"
                                        placeholder="Search Products">
                                </div>
                            </div>

                            <!-- Category Filter -->
                            <div class="filter-item">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control select2">
                                    <option value="">Select Category</option>
                                    <option value="Category 1">Category 1</option>
                                    <option value="Category 2">Category 2</option>
                                </select>
                            </div>

                            <!-- Price Range Filter -->
                            <div class="filter-item">
                                <label for="price_range">Price Range</label>
                                <div id="price-range-slider" class="slider"></div>
                                <div class="d-flex justify-content-between">
                                    <input type="number" name="price_min" id="price_min" class="form-control"
                                        placeholder="Min Price">
                                    <input type="number" name="price_max" id="price_max" class="form-control"
                                        placeholder="Max Price">
                                </div>
                            </div>

                            <!-- Stock Quantity Filter -->
                            <div class="filter-item">
                                <label for="stock_range">Stock Range</label>
                                <div id="stock-range-slider" class="slider"></div>
                                <div class="d-flex justify-content-between">
                                    <input type="number" name="stock_min" id="stock_min" class="form-control"
                                        placeholder="Min Stock">
                                    <input type="number" name="stock_max" id="stock_max" class="form-control"
                                        placeholder="Max Stock">
                                </div>
                            </div>

                            <!-- On Sale Filter -->
                            <div class="filter-item">
                                <label for="on_sale">On Sale</label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-primary">
                                        <input type="radio" name="on_sale" value="1"> Yes
                                    </label>
                                    <label class="btn btn-outline-primary">
                                        <input type="radio" name="on_sale" value="0"> No
                                    </label>
                                </div>
                            </div>

                            <!-- Status Filter -->
                            <div class="filter-item">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control select2">
                                    <option value="">Select Status</option>
                                    <option value="available">Available</option>
                                    <option value="unavailable">Unavailable</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mt-4">
                                <i class="fas fa-filter"></i> Apply Filters
                            </button>
                            <button type="button" id="reset-filters" class="btn btn-outline-secondary btn-block mt-2">
                                <i class="fas fa-sync-alt"></i> Reset Filters
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            @include('frontend.partials.new_arrival')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- New Arrivals Section End -->

    <!-- Newsletter Section Start -->
    <section id="newsletter" class="newsletter">
        @include('frontend.partials.newsletter')
    </section>
    <!-- Newsletter Section End -->
@endsection

@section('styles')
    <style>
        /* Custom Styles */
        .product-filter {
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
        }

        .filter-title {
            font-size: 1.6rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
        }

        .filter-item {
            margin-bottom: 20px;
        }

        .filter-item label {
            font-weight: 600;
            margin-bottom: 10px;
            display: block;
            color: #555;
        }

        .filter-item select,
        .filter-item input {
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ddd;
            width: 100%;
            font-size: 14px;
            transition: border-color 0.3s ease;
            margin-top: 5px;
        }

        .filter-item select:focus,
        .filter-item input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
        }

        .btn-group-toggle .btn {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .btn-group-toggle .btn.active {
            background-color: #007bff;
            color: white;
        }

        .slider {
            margin: 15px 0;
        }

        .product-filter button {
            background-color: #007bff;
            color: white;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-top: 15px;
        }

        .product-filter button:hover {
            background-color: #0056b3;
        }

        #reset-filters {
            background-color: #f8f9fa;
            color: #333;
            border: 1px solid #ddd;
            margin-top: 10px;
        }

        #reset-filters:hover {
            background-color: #e9ecef;
        }

        .card {
            border-radius: 8px;
        }

        .card-header {
            background-color: #f7f7f7;
            border-bottom: 1px solid #ddd;
        }

        .card-body {
            padding: 20px;
        }

        .newsletter {
            padding: 50px 0;
            background: #f9f9f9;
            text-align: center;
        }

        .newsletter h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .newsletter button {
            background-color: #007bff;
            color: white;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        .newsletter button:hover {
            background-color: #0056b3;
        }
    </style>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            // Initialize Select2 for dropdowns
            $('.select2').select2({
                placeholder: "Select an option",
                allowClear: true
            });

            // Initialize Price Range Slider
            $('#price-range-slider').slider({
                range: true,
                min: 0,
                max: 1000,
                values: [0, 1000],
                slide: function (event, ui) {
                    $('#price_min').val(ui.values[0]);
                    $('#price_max').val(ui.values[1]);
                }
            });

            // Initialize Stock Range Slider
            $('#stock-range-slider').slider({
                range: true,
                min: 0,
                max: 100,
                values: [0, 100],
                slide: function (event, ui) {
                    $('#stock_min').val(ui.values[0]);
                    $('#stock_max').val(ui.values[1]);
                }
            });

            // Reset Filters
            $('#reset-filters').click(function () {
                $('#filter-form')[0].reset();
                $('.select2').val('').trigger('change');
                $('#price-range-slider').slider('values', [0, 1000]);
                $('#stock-range-slider').slider('values', [0, 100]);
            });
        });
    </script>
@endsection
