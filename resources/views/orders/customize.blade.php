{{-- resources/views/order-items/customize.blade.php --}}
<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-xl font-bold mb-4">Customize Pizza Toppings</h1>
                <form action="{{ route('order-items.updateCustomization', $orderItem->id) }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        @foreach ($toppings as $topping)
                        <div class="flex items-center mb-2">
                            <input type="checkbox" id="topping-{{ $topping->id }}" name="toppings[]" value="{{ $topping->id }}" class="mr-2">
                            <label for="topping-{{ $topping->id }}">{{ $topping->name }} (£0.85)</label>
                        </div>
                        @endforeach
                    </div>
                    <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 rounded-lg text-white">Update Toppings</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
