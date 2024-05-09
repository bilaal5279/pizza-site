<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-xl font-bold">Review Your Order</h1>
                @if ($order->orderItems && $order->orderItems->count() > 0)
                    <ul>
                        @foreach ($order->orderItems as $item)
                            <li>
                                {{ $item->pizza->name }} - {{ $item->size }} - £{{ number_format($item->price, 2) }}
                                @if ($item->toppings && $item->toppings->count() > 0)
                                    <ul>
                                        @foreach ($item->toppings as $topping)
                                            <li>{{ $topping->name }} (+£0.85 each)</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No items in your order.</p>
                @endif
                <form action="{{ route('orders.updateDelivery', $order->id) }}" method="POST">
                    @csrf
                    <div class="mt-4">
                        <span>Delivery Options:</span>
                        <label>
                            <input type="radio" name="delivery_type" value="collection" {{ $order->delivery_type == 'collection' ? 'checked' : '' }}>
                            Collection
                        </label>
                        <label>
                            <input type="radio" name="delivery_type" value="delivery" {{ $order->delivery_type == 'delivery' ? 'checked' : '' }}>
                            Delivery (£5.00)
                        </label>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update Delivery Option
                        </button>
                    </div>
                </form>
                <p class="mt-4">Total: £{{ number_format($order->total_price + ($order->delivery_type == 'delivery' ? 5 : 0), 2) }}</p>
                <form method="POST" action="{{ route('orders.submit', $order->id) }}">
                    @csrf
                    <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Submit Order
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
