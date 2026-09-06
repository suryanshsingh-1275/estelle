@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')

<div class="admin-header">

    <div>

        <span>
            ESTELLE ADMINISTRATION
        </span>

        <h1>
            Dashboard
        </h1>

    </div>

    <div class="admin-user">
        {{ Auth::user()->name }}
    </div>

</div>


<div class="stats-grid">

    <div class="stat-card">

        <span>
            CUSTOMERS
        </span>

        <strong>
            {{ $totalCustomers }}
        </strong>

    </div>


    <div class="stat-card">

        <span>
            CART ITEMS
        </span>

        <strong>
            {{ $totalCartItems }}
        </strong>

    </div>


    <div class="stat-card">

        <span>
            CART VALUE
        </span>

        <strong>
            ₹{{ number_format($totalCartValue) }}
        </strong>

    </div>

</div>


<section class="admin-section">

    <div class="admin-section-header">

        <div>

            <span>
                CUSTOMER ACTIVITY
            </span>

            <h2>
                Cart Information
            </h2>

        </div>

    </div>


    <div class="table-wrapper">

        <table>

            <thead>

                <tr>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Added</th>
                </tr>

            </thead>

            <tbody>

                @forelse($cartItems as $item)

                    <tr>

                        <td>
                            {{ $item->user->name }}
                            <br>
                            <small>
                                {{ $item->user->email }}
                            </small>
                        </td>

                        <td>
                            <div class="table-product">

                                @if($item->product_image)

                                    <img
                                        src="{{ $item->product_image }}"
                                        alt="{{ $item->product_name }}"
                                    >

                                @endif

                                <span>
                                    {{ $item->product_name }}
                                </span>

                            </div>
                        </td>

                        <td>
                            ₹{{ number_format($item->price) }}
                        </td>

                        <td>
                            {{ $item->quantity }}
                        </td>

                        <td>
                            ₹{{ number_format(
                                $item->price * $item->quantity
                            ) }}
                        </td>

                        <td>
                            {{ $item->created_at->format('d M Y') }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="empty-table">
                            No cart activity yet.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</section>

@endsection