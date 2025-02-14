@extends('frontend.front_app')
@section('content')

    <!-- Carousel Section -->
    <section id="carousel-section">
        {{-- start carousel --}}
        @include('frontend.partials.carousel')
        {{-- end carousel --}}
    </section>
    <!-- Carousel Section End -->

    {{-- <!-- start populer-products -->
    <section id="populer-products" class="populer-products">
        @include('frontend.partials.popular_product')
    </section>
    <!-- end populer-products --> --}}



    <!-- sofa-collection start -->
    <section id="sofa-collection">
        @include('frontend.partials.sofa_collection')
    </section>
    <!-- sofa-collection end -->

    <!-- feature start -->
    <section id="feature" class="feature">
        @include('frontend.partials.feature')
    </section>
    <!--feature end -->

    <!--blog start -->
    <section id="blog" class="blog">
        @include('frontend.partials.blog')
    </section><!--/.blog-->
    <!--blog end -->

    <!-- clients strat -->
    <section id="clients" class="clients">
        @include('frontend.partials.client')
    </section><!--/.clients-->
    <!-- clients end -->

    <!-- newsletter strat -->
    <section id="newsletter" class="newsletter">
        @include('frontend.partials.newsletter')
    </section>
    <!-- newsletter end -->

@endsection
