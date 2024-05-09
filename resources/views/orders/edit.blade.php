<x-app-layout>
    <div class="container mx-auto px-4">
        <h1 class="text-xl font-bold mb-4">Add Pizzas to Your Order</h1>
        @foreach ($pizzas as $pizza)
            <div class="bg-white shadow-md rounded-lg mb-4 p-4">
                <h5 class="text-lg font-medium">{{ $pizza->name }}</h5>
                <p>{{ $pizza->description }}</p>
                <form action="{{ route('orders.addPizza', $order->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="pizza_id" value="{{ $pizza->id }}">
                    <div class="mb-4">
                        <label for="size-{{ $pizza->id }}" class="block text-sm font-medium text-gray-700">Size</label>
                        <select id="size-{{ $pizza->id }}" name="size" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            @foreach ($pizza->sizes as $size)
                                <option value="{{ $size->size }}">{{ $size->size }} - £{{ number_format($size->price, 2) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add to Order</button>
                </form>
            </div>
        @endforeach
    </div>
</x-app-layout>
