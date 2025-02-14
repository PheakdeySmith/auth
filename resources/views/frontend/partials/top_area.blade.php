<div class="top-area">
    <div class="header-area">
        <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"
            data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

            <div class="container">
                <div class="attr-nav">
                    <ul>
                        <li class="search">
                            <a href="#"><span class="lnr lnr-magnifier"></span></a>
                        </li>
                        <li class="nav-setting">
                            <a href="#"><span class="lnr lnr-cog"></span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="lnr lnr-cart"></span>
                                <span class="badge badge-bg-1">{{ count($cartItems ?? []) }}</span>
                            </a>
                            <ul class="dropdown-menu cart-list s-cate">
                                @foreach ($cartItems ?? [] as $cartItem)
                                    @php
                                        $product = $cartItem->product;
                                    @endphp
                                    <li class="single-cart-list">
                                        <a href="#" class="photo">
                                            <img src="{{ asset('storage/' . $product->image) }}" class="cart-thumb" alt="image" />
                                        </a>
                                        <div class="cart-list-txt">
                                            <h6><a href="#">{{ $product->product_name }}</a></h6>
                                            <p>{{ $cartItem->quantity }} x - <span class="price">${{ number_format($cartItem->price, 2) }}</span></p>
                                        </div>
                                        <div class="cart-close">
                                            <span class="lnr lnr-cross"></span>
                                        </div>
                                    </li>
                                @endforeach
                                <li class="total">
                                    <span>Total: ${{ number_format($cartItems->sum(function($item) {
                                        return $item->price * $item->quantity;
                                    }), 2) }}</span>
                                    <button class="btn-cart pull-right" onclick="window.location.href='{{ route('frontend.cart') }}'">view cart</button>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.html"><span>eO</span>shop</a>
                </div>

                <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="scroll active"><a href="{{ route('frontend.index') }}">home</a></li>
                        <li class="scroll"><a href="{{ route('frontend.new_arrival') }}">new arrival</a></li>
                        <li class="scroll"><a href="#feature">features</a></li>
                        <li class="scroll"><a href="#blog">blog</a></li>
                        <li class="scroll"><a href="#newsletter">contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="clearfix"></div>
</div>
