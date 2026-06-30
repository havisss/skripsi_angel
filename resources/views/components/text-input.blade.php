@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-200 text-gray-900 bg-white focus:border-kop-green focus:ring-kop-green rounded-xl shadow-sm px-4 py-3 transition duration-200']) }}>
