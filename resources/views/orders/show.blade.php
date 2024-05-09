    <x-app>
    <div class="container">
        <h1>Order Details</h1>
        <ul>
            @foreach ($order->items as $item)
                <li>
                    {{ $item->pizza->name }} - {{ $item->quantity }} x £{{ number_format($item->price, 2) }}
                    <a href="{{ route('order-items.customize', $item->id) }}" class="btn btn-link">Customize</a>
                </li>
            @endforeach
        </ul>
        <p>Total: £{{ number_format($order->total_price, 2) }}</p>
        <form action="{{ route('orders.submit', $order->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Submit Order</button>
        </form>
    </div>
</x-app>
