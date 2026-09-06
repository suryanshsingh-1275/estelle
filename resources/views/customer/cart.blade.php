@extends('layouts.customer')

@section('title', 'Your Cart | Estelle')

@section('content')

<section class="section">

    <div class="section-heading">

        <span>YOUR ESTELLE BAG</span>

        <h2>
            Shopping Cart
        </h2>

    </div>


    @if($cartItems->count())

        <div class="cart-page">

            <div class="cart-items">

                @foreach($cartItems as $item)

                    <div class="cart-item">

                        @if($item->product_image)

                            <img
                                src="{{ $item->product_image }}"
                                alt="{{ $item->product_name }}"
                            >

                        @endif

                        <div class="cart-item-info">

                            <h3>
                                {{ $item->product_name }}
                            </h3>

                            <p>
                                ₹{{ number_format($item->price) }}
                            </p>

                            <span>
                                Quantity: {{ $item->quantity }}
                            </span>

                        </div>

                        <strong>
                            ₹{{ number_format(
                                $item->price * $item->quantity
                            ) }}
                        </strong>

                        <form
                            method="POST"
                            action="{{ route(
                                'api.cart.remove',
                                $item
                            ) }}"
                        >

                            @csrf

                            <button class="remove-cart">
                                Remove
                            </button>

                        </form>

                    </div>

                @endforeach

            </div>


            <div class="cart-summary">

                <span>
                    CART TOTAL
                </span>

                <strong>
                    ₹{{ number_format($total) }}
                </strong>

                <button>
                    CHECKOUT
                </button>

            </div>

        </div>

    @else

        <div class="empty-cart">

            <h3>
                Your cart is empty.
            </h3>

            <p>
                Discover something beautiful from our collection.
            </p>

            <a href="/">
                CONTINUE SHOPPING
            </a>

        </div>

    @endif

</section>

@endsection

