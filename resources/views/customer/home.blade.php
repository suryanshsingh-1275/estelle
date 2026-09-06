@extends('layouts.customer')

@section('title', 'Estelle | Jewellery')

@section('content')

<section class="hero">

    <div class="hero-content">

        <span class="hero-small">
            ESTELLE SINCE 1989
        </span>

        <h1>
            FESTIVE GIFTS
            <br>
            UPTO 50% OFF
        </h1>

        <p>
            Celebrate the joy of togetherness
            with gifts that shine.
        </p>

        <a href="#new-arrivals" class="hero-button">
            SHOP NOW
        </a>

    </div>

</section>


<section class="section category-section">

    <div class="section-heading">
        <span>SHOP BY CATEGORY</span>
        <h2>Find Your Style</h2>
    </div>

    <div class="category-grid">

        @foreach($categories as $category)

            <a href="#" class="category-card">

                <img
                    src="{{ $category['image'] }}"
                    alt="{{ $category['name'] }}"
                >

                <span>
                    {{ strtoupper($category['name']) }}
                </span>

            </a>

        @endforeach

    </div>

</section>


<section class="collection-banner">

    <div class="collection-content">

        <span>OUR SPECIALTY COLLECTION</span>

        <h2>
            ROSE GOLD
        </h2>

        <p>
            Long-Lasting Finish |
            Skin-Friendly |
            Premium Craftsmanship
        </p>

        <a href="#new-arrivals">
            EXPLORE COLLECTION
        </a>

    </div>

</section>


<section
    class="section products-section"
    id="new-arrivals"
>

    <div class="section-heading">

        <span>NEW ARRIVALS</span>

        <h2>
            Fresh From The Collection
        </h2>

        <a href="#products">
            Shop Collection →
        </a>

    </div>


    <div class="product-grid">

        @foreach($products as $product)

            <article class="product-card">

                <div class="product-image">

                    <img
                        src="{{ $product['image'] }}"
                        alt="{{ $product['name'] }}"
                    >

                    <button class="wishlist">
                        ♡
                    </button>

                    <span class="discount">
                        -{{ $product['discount'] }}%
                    </span>

                </div>

                <div class="product-info">

                    <h3>
                        {{ $product['name'] }}
                    </h3>

                    <div class="price-row">

                        <span class="old-price">
                            ₹{{ number_format($product['original_price']) }}
                        </span>

                        <strong>
                            ₹{{ number_format($product['price']) }}
                        </strong>

                    </div>

                    <form
                        method="POST"
                        action="{{ route('api.cart.add') }}"
                    >

                        @csrf

                        <input
                            type="hidden"
                            name="product_name"
                            value="{{ $product['name'] }}"
                        >

                        <input
                            type="hidden"
                            name="product_image"
                            value="{{ $product['image'] }}"
                        >

                        <input
                            type="hidden"
                            name="price"
                            value="{{ $product['price'] }}"
                        >

                        <button
                            type="submit"
                            class="add-cart"
                        >
                            ADD TO CART
                        </button>

                    </form>

                </div>

            </article>

        @endforeach

    </div>

</section>


<section class="budget-section">

    <div class="budget-intro">

        <span>Your Budget,</span>

        <strong>
            Your Bling
        </strong>

    </div>

    <a href="#" class="budget-card">
        <span>UNDER</span>
        <strong>₹999</strong>
        <i>→</i>
    </a>

    <a href="#" class="budget-card">
        <span>UNDER</span>
        <strong>₹1,499</strong>
        <i>→</i>
    </a>

    <a href="#" class="budget-card">
        <span>UNDER</span>
        <strong>₹2,999</strong>
        <i>→</i>
    </a>

    <a href="#" class="budget-card premium">
        <span>PREMIUM</span>
        <strong>PEARLS</strong>
        <i>→</i>
    </a>

</section>


<section class="section">

    <div class="section-heading">

        <span>BESTSELLERS</span>

        <h2>
            Loved By Everyone
        </h2>

    </div>

    <div class="product-grid">

        @foreach(array_slice($products, 2, 4) as $product)

            <article class="product-card">

                <div class="product-image">

                    <img
                        src="{{ $product['image'] }}"
                        alt="{{ $product['name'] }}"
                    >

                    <button class="wishlist">
                        ♡
                    </button>

                </div>

                <div class="product-info">

                    <h3>
                        {{ $product['name'] }}
                    </h3>

                    <div class="price-row">

                        <span class="old-price">
                            ₹{{ number_format($product['original_price']) }}
                        </span>

                        <strong>
                            ₹{{ number_format($product['price']) }}
                        </strong>

                    </div>

                </div>

            </article>

        @endforeach

    </div>

</section>


<section class="trust-section">

    <div>
        <strong>24K GOLD-PLATED</strong>
        <span>JEWELLERY</span>
    </div>

    <div>
        <strong>DESIGNED IN</strong>
        <span>HYDERABAD</span>
    </div>

    <div>
        <strong>HANDCRAFTED</strong>
        <span>SKIN FRIENDLY</span>
    </div>

    <div>
        <strong>35+ YEARS</strong>
        <span>LEGACY</span>
    </div>

    <div>
        <strong>1 YEAR</strong>
        <span>WARRANTY</span>
    </div>

    <div>
        <strong>LIFETIME</strong>
        <span>SERVICE</span>
    </div>

</section>


<section class="newsletter">

    <div>

        <span>
            Get the Glow – Exclusive Access Awaits
        </span>

        <p>
            Subscribe and get 5% off your first purchase.
        </p>

    </div>

    <form>
        <input
            type="email"
            placeholder="Your email address"
        >

        <button>
            SUBSCRIBE
        </button>
    </form>

</section>

@endsection
