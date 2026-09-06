<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $totalCustomers = User::where('role', 'customer')->count();

        $totalCartItems = Cart::sum('quantity');

        $totalCartValue = Cart::selectRaw(
            'SUM(price * quantity) as total'
        )->value('total') ?? 0;

        $cartItems = Cart::with('user')
            ->latest()
            ->get();

        return view('admin.dashboard', compact(
            'totalCustomers',
            'totalCartItems',
            'totalCartValue',
            'cartItems'
        ));
    }
}

