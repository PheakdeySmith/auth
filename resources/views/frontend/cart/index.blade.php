@extends('frontend.front_app')

@section('content')
    <div style="margin-top: 150px;"></div>

    <!-- Shopping Cart Section -->
    <div class="container">
        <div class="section-header text-center mb-4">
            <h2>Your Shopping Cart</h2>
        </div>

        @if($cartItems->isEmpty())
            <div class="text-center">
                <div class="alert alert-info">
                    Your cart is currently empty.
                    <br>
                    <a href="{{ route('frontend.index') }}" class="btn btn-primary mt-3">Continue Shopping</a>
                </div>
            </div>
        @else
            <div class="new-arrivals-content mt-5 mb-5">
                <div class="row justify-content-center mt-4">
                    <!-- Cart Items Table (Left Column) -->
                    <div class="col-md-8">
                        <div class="card p-4 shadow-lg border-0 rounded-3 bg-light">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $cartItem)
                                            <tr>
                                                <!-- Product Image -->
                                                <td class="text-center" style="width: 100px;">
                                                    <img src="{{ $cartItem->product->image ? asset('storage/' . $cartItem->product->image) : asset('front_assets/images/collection/default.png') }}"
                                                         alt="{{ $cartItem->product->product_name }}"
                                                         class="img-fluid" style="max-width: 80px; height: 80px; object-fit: cover;">
                                                </td>

                                                <!-- Product Name -->
                                                <td>{{ $cartItem->product->product_name }}</td>

                                                <!-- Price -->
                                                <td>
                                                    @if($cartItem->product->discount_price)
                                                        <span class="text-danger"><del>${{ number_format($cartItem->product->price, 2) }}</del></span>
                                                        ${{ number_format($cartItem->product->discount_price, 2) }}
                                                    @else
                                                        ${{ number_format($cartItem->product->price, 2) }}
                                                    @endif
                                                </td>

                                                <!-- Quantity -->
                                                <td>{{ $cartItem->quantity }}</td>

                                                <!-- Total Price -->
                                                <td>${{ number_format($cartItem->price * $cartItem->quantity, 2) }}</td>

                                                <!-- Remove Button -->
                                                <td>
                                                    <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <span class="lnr lnr-trash"></span> Remove
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary (Right Column) -->
                    <div class="col-md-4">
                        <div class="card p-4 shadow-lg border-0 rounded-3 bg-primary text-white">
                            <h4 class="text-center mb-4">Order Summary</h4>
                            <hr class="border-white">
                            <p class="fs-5"><strong>Subtotal:</strong> ${{ number_format($cartItems->sum(fn($item) => $item->price * $item->quantity), 2) }}</p>
                            <p class="fs-5"><strong>Shipping:</strong> Free</p>
                            <p class="fs-4"><strong>Total:</strong> ${{ number_format($cartItems->sum(fn($item) => $item->price * $item->quantity), 2) }}</p>
                            <a href="{{ route('frontend.index') }}" class="btn btn-light btn-block">Continue Shopping</a>
                            {{-- <a href="{{ route('checkout.index') }}" class="btn btn-dark btn-block mt-2">Proceed to Checkout</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Newsletter Section -->
    <section id="newsletter" class="newsletter">
        @include('frontend.partials.newsletter')
    </section>

@endsection

<style>
    /* General Layout */
    .new-arrivals-content {
        margin: 0 auto;
        padding: 20px 0;
    }

    .card {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .table th, .table td {
        vertical-align: middle;
        text-align: center;
        padding: 15px;
    }

    .bg-primary {
        background-color: #007bff !important;
    }

    .bg-primary {
        background-color: #c89f23 !important;
    }

    .card h4 {
        font-size: 1.75rem;
        font-weight: bold;
        color: white;
    }

    .card p {
        font-size: 1.25rem;
        color: #fff;
    }

    .btn-light {
        background-color: white;
        color: #333;
        font-weight: bold;
        border-radius: 8px;
        padding: 10px 20px;
    }


    .btn-danger {
        background-color: #c89f23;
        border-radius: 8px;
        padding: 8px 16px;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #b88f1f;
    }

    .btn-sm {
        padding: 0.5rem 1rem;
    }

    .fs-5 {
        font-size: 1.3rem;
    }

    .fs-4 {
        font-size: 1.5rem;
    }

    .card {
        padding: 20px;
    }

    .table-responsive {
        padding: 10px;
    }

    .btn-block {
        margin-top: 20px;
    }
</style>
