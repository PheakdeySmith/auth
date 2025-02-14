<div class="container-fluid">
    <div class="section-header text-center mb-4">
        <h2>New Arrivals</h2>
    </div>

    <div class="new-arrivals-content">
        <div class="row justify-content-center">
            @foreach ($products as $product)
                <div class="col-md-3 col-sm-4 mb-4">
                    <div class="single-new-arrival">
                        <div class="card">
                            <!-- Product Image -->
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('front_assets/images/collection/default.png') }}"
                                 alt="{{ $product->product_name }}" class="card-img-top">

                            <div class="card-body d-flex flex-column">
                                <!-- Product Name -->
                                <h5 class="card-title"><a href="#">{{ $product->product_name }}</a></h5>

                                <!-- Product Price -->
                                <p class="card-text">
                                    @if($product->discount_price)
                                        <span class="text-danger"><del>${{ number_format($product->price, 2) }}</del></span>
                                        ${{ number_format($product->discount_price, 2) }}
                                    @else
                                        ${{ number_format($product->price, 2) }}
                                    @endif
                                </p>

                                <!-- Add to Cart Button -->
                                <form action="{{ route('cart.add') }}" method="POST" class="mt-auto">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <span class="lnr lnr-cart"></span> Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    /* Ensure cards have equal height */
    .new-arrivals-content {
        margin: 0 auto;
        padding: 20px 0;
    }

    .single-new-arrival {
        display: flex;
        justify-content: center;
        align-items:center;
        height: 100%;
    }

    .card {
        border-radius: 8px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card-img-top {
        object-fit: scale-down;
        height: 150px;
        width: 100%;
    }

    .card-body {
        padding: 0px;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .card-title {
        font-size: 1.1rem;
        height: 50px;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 16px;
        margin-bottom: 10px;
        height: 40px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .card-body .mt-2 {
        margin-top: 5px;
    }

    .btn-block {
        width: 100%;
        margin-top: auto;
    }

    /* Ensure button is always at the bottom */
    form.mt-auto {
        margin-top: auto;
    }
</style>
