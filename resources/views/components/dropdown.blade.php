<div>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
</div><div x-data="{ open: false }" class="relative">
    <button @click="open = !open" class="flex items-center gap-2 py-2 px-4 rounded-lg hover:bg-green-200 transition">
        {!! $icon !!}
        {{ $label }}
        <svg :class="{'rotate-180': open}" class="w-4 h-4 ml-1 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" @click.away="open = false"
         class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-lg py-2 z-50 border border-gray-200">
        {{ $slot }}
    </div>
</div>
