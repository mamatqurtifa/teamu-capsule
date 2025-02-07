@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-md shadow-sm px-2 py-1.5 border']) }}>
