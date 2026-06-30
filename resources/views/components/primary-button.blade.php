<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-3 bg-kop-green border border-transparent rounded-xl font-bold text-xs text-white uppercase tracking-widest hover:bg-kop-greenDark focus:bg-kop-greenDark active:bg-kop-greenDark focus:outline-none focus:ring-2 focus:ring-kop-green focus:ring-offset-2 transition ease-in-out duration-150 shadow-md shadow-kop-green/30']) }}>
    {{ $slot }}
</button>
