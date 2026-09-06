<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Estelle Admin')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="admin-body">

    <aside class="admin-sidebar">

        <a href="/admin" class="admin-logo">
            Estelle
            <span>ADMIN</span>
        </a>

        <nav>

            <a href="/admin" class="active">
                Dashboard
            </a>

            <a href="#">
                Products
            </a>

            <a href="#">
                Categories
            </a>

            <a href="#">
                Orders
            </a>

            <a href="#">
                Customers
            </a>

        </nav>

        <div class="admin-sidebar-bottom">

            <a href="/">
                View Store
            </a>

            <form
                method="POST"
                action="{{ route('api.logout') }}"
            >

                @csrf

                <button>
                    Logout
                </button>

            </form>

        </div>

    </aside>


    <main class="admin-main">

        @yield('content')

    </main>

</body>

</html>