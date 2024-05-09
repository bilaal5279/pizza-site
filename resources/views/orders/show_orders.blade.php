<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-xl font-bold">Order Details</h1>
                <p>Order ID: {{ $order->id }}</p>
                <ul>
                    @foreach ($order->orderItems as $item)
                        <li>{{ $item->pizza->name }} - Quantity: {{ $item->quantity }}</li>
                        <ul>
                            @foreach ($item->toppings as $topping)
                                <li>{{ $topping->name }} (+£0.85)</li>
                            @endforeach
                        </ul>
                    @endforeach
                </ul>
                <p>Total: £{{ number_format($order->total_price, 2) }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
