<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')
                ->with('error', 'Please login to add products to your cart.');
        }

        $validated = $request->validate([
            'product_name' => ['required', 'string', 'max:255'],
            'product_image' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
        ]);

        $existing = Cart::where('user_id', Auth::id())
            ->where('product_name', $validated['product_name'])
            ->first();

        if ($existing) {
            $existing->increment('quantity');
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_name' => $validated['product_name'],
                'product_image' => $validated['product_image'] ?? null,
                'price' => $validated['price'],
                'quantity' => 1,
            ]);
        }

        return back()->with('success', 'Product added to cart.');
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $cartItems = Cart::where('user_id', Auth::id())
            ->latest()
            ->get();

        $total = $cartItems->sum(
            fn ($item) => $item->price * $item->quantity
        );

        return view('customer.cart', compact(
            'cartItems',
            'total'
        ));
    }

    public function remove(Cart $cart)
    {
        if (!Auth::check() || $cart->user_id !== Auth::id()) {
            abort(403);
        }

        $cart->delete();

        return back()->with('success', 'Item removed from cart.');
    }
}
