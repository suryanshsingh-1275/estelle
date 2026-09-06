<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function home()
    {
        return view('customer.home', [
            'categories' => config('catalog.categories'),
            'products' => config('catalog.products'),
            'cartCount' => Auth::check()
                ? Auth::user()->carts()->sum('quantity')
                : 0,
        ]);
    }

    public function loginPage()
    {
        return view('customer.login');
    }

    public function signupPage()
    {
        return view('customer.signup');
    }
}
