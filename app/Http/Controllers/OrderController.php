<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Store a newly created order (Top-Up or Joki Boosting) in the database.
     */
    public function store(Request $request)
    {
        // Validation parameters
        $rules = [
            'service_id' => 'required|exists:services,id',
            'payment_method' => 'required|string',
        ];

        // Conditional validation depending on category (Top-Up vs Boosting)
        $isJoki = $request->input('category') === 'joki';
        
        if ($isJoki) {
            $rules['account_email'] = 'required|string';
            $rules['account_password'] = 'required|string';
            $rules['login_via'] = 'required|string';
            $rules['hero_request'] = 'nullable|string';
        } else {
            $rules['game_id'] = 'required|string';
            $rules['zone_id'] = 'required|string';
        }

        $validated = $request->validate($rules);

        $service = Service::findOrFail($validated['service_id']);

        // Generate custom order ID reference: INV-YYYYMMDD-RAND
        $timestamp = now();
        $orderId = 'INV-' . $timestamp->format('Ymd') . '-' . rand(1000, 9999);

        $order = Order::create([
            'order_id' => $orderId,
            'game_id' => $request->input('game_id'),
            'zone_id' => $request->input('zone_id'),
            'account_email' => $request->input('account_email'),
            'account_password' => $request->input('account_password'),
            'login_via' => $request->input('login_via'),
            'hero_request' => $request->input('hero_request'),
            'service_id' => $service->id,
            'total_price' => $service->price,
            'status' => 'pending',
            'payment_method' => $validated['payment_method'],
        ]);

        return redirect()->route('order.invoice', ['order_id' => $order->order_id])
                         ->with('success', 'Order created successfully!');
    }

    /**
     * Display the invoice details based on the database record.
     */
    public function show($order_id)
    {
        $order = Order::where('order_id', $order_id)->firstOrFail();
        $service = $order->service;

        return view('invoice', compact('order', 'service'));
    }
}
