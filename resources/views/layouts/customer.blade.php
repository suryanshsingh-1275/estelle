<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Estelle')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="announcement">
        Free gift on orders above ₹1,499
    </div>

    <div class="season-bar">
        FESTIVE SEASON IS HERE
    </div>

    <header class="site-header">

        <div class="header-top">

            <div class="store-link">
                Store Locator
            </div>

            <a href="/" class="logo">
                Estelle
            </a>

            <div class="header-actions">

                <form class="search-box">
                    <input
                        type="text"
                        placeholder="Search for products"
                    >
                </form>

                <a href="#" class="header-icon">♡</a>

                <a href="/cart" class="cart-link">
                    Cart

                    @auth
                        <span class="cart-badge">
                            {{ Auth::user()->carts()->sum('quantity') }}
                        </span>
                    @endauth
                </a>

                @auth

                    @if(Auth::user()->role === 'admin')
                        <a href="/admin" class="account-link">
                            Admin
                        </a>
                    @else
                        <span class="account-link">
                            {{ Auth::user()->name }}
                        </span>
                    @endif

                    <form
                        method="POST"
                        action="{{ route('api.logout') }}"
                    >
                        @csrf

                        <button class="logout-button">
                            Logout
                        </button>
                    </form>

                @else

                    <a href="/login" class="account-link">
                        Login
                    </a>

                @endauth

            </div>

        </div>

        <nav class="main-nav">

            <a href="#">HASHU COLLECTION</a>
            <a href="#">CRYSTAL BLOOMS</a>
            <a href="#">FESTIVE GIFT GUIDE</a>
            <a href="#">NEW ARRIVALS</a>
            <a href="#">COLOR POP COLLECTION</a>
            <a href="#">WEDDING SEASON</a>
            <a href="#">NECKLACES</a>
            <a href="#">CATEGORIES</a>
            <a href="#">BEST SELLER</a>

        </nav>

    </header>


    @if(session('success'))
        <div class="flash success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="flash error">
            {{ session('error') }}
        </div>
    @endif


    @yield('content')


    <footer class="footer">

        <div class="footer-grid">

            <div>
                <h4>EXPLORE</h4>
                <a href="#">About Estelle</a>
                <a href="#">Privacy Policy</a>
                <a href="#">FAQ</a>
                <a href="#">Franchise</a>
            </div>

            <div>
                <h4>KNOW YOUR JEWELLERY</h4>
                <a href="#">Rose Collection</a>
                <a href="#">Earring</a>
                <a href="#">Maang Tika</a>
                <a href="#">Crystal Blooms</a>
            </div>

            <div>
                <h4>CUSTOMER SERVICE</h4>
                <a href="#">Find Your Order</a>
                <a href="#">Return Exchange Policy</a>
                <a href="#">Shipping & Delivery</a>
                <a href="#">Track Order</a>
            </div>

            <div>
                <h4>CONTACT US</h4>

                <p>
                    Estelle Accessories Pvt. Ltd.
                </p>

                <p>
                    Hyderabad, Telangana
                </p>

                <p>
                    +91 8247476318
                </p>

                <p>
                    info@estele.co
                </p>
            </div>

        </div>

        <div class="footer-bottom">
            © {{ date('Y') }} Estelle. All rights reserved.
        </div>

    </footer>

</body>
</html>