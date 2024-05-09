<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderItemTopping;
use App\Models\Topping;


class OrderController extends Controller
{
    // Start a new order immediately after login
    public function create()
    {
        $order = new Order();
        $order->user_id = Auth::id(); // Assuming there is a user_id column in 'orders'
        $order->total_price = 0;
        $order->save();

        return redirect()->route('orders.edit', $order->id);
    }



    // Show form to add pizzas to the order
    public function edit(Order $order)
    {
        $pizzas = Pizza::all(); // Get all pizzas with their sizes
        return view('orders.edit', compact('order', 'pizzas'));
    }

    // Add a pizza to the order
    public function addPizza(Request $request, Order $order)
    {
        $pizza = Pizza::find($request->pizza_id);
        $price = $pizza->sizes()->where('size', $request->size)->first()->price;
    
        $orderItem = new OrderItem([
            'order_id' => $order->id,
            'pizza_id' => $pizza->id,
            'size' => $request->size,
            'price' => $price,
            'quantity' => $request->input('quantity', 1)  // assuming quantity is provided, default to 1
        ]);
        $orderItem->save();
    
        // Update total price of the order
        $order->total_price += $orderItem->price * $orderItem->quantity;
        $order->save();
    
        // Redirect to the review page instead of directly to submit
        return redirect()->route('orders.review', $order->id);
    }
    
    public function updateDelivery(Request $request, Order $order)
{
    // First, ensure the user is authorized to update this order
    if ($order->user_id !== auth()->id()) {
        abort(403);
    }

    // Update the delivery type
    $order->delivery_type = $request->delivery_type;

    // Check if the delivery type is 'delivery' and apply the charge
    if ($request->delivery_type === 'delivery') {
        $order->delivery_charge = 5.00;
    } else {
        $order->delivery_charge = 0;
    }

    // Save the updated order
    $order->save();

    // Redirect back to the review page
    return redirect()->route('orders.review', $order->id)->with('success', 'Delivery option updated successfully.');
}




public function review(Order $order)
{
    // Make sure the order belongs to the currently authenticated user
    if ($order->user_id !== auth()->id()) {
        abort(403);
    }

    // Eager load the order items (and possibly items' toppings if needed)
    $order = Order::with(['orderItems', 'orderItems.toppings'])->find($order->id);

    // Make sure to point to a view that allows reviewing the order
    return view('orders.review', compact('order'));
}

    

    public function submit(Order $order)
    {
        // Confirm the user has the right to submit this order
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }
    
        // Mark the order as submitted
        $order->is_submitted = true;
        $order->save();
    
        // Redirect to a 'Thank You' page or similar
        return view('orders.submit');
    }

    public function index()
    {
        // Retrieve all submitted orders for the logged-in user
        $orders = Order::where('user_id', auth()->id())
                       ->where('is_submitted', true)
                       ->get();
    
        return view('orders.index', compact('orders'));
    }
        
    
    public function show(Order $order)
    {
        // Ensure the order belongs to the currently authenticated user
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }
    
        // Eager load related data if necessary, like order items
        $order = Order::with(['orderItems', 'orderItems.toppings'])->find($order->id);
    
        return view('orders.show_orders', compact('order'));
    }
    
    
}
