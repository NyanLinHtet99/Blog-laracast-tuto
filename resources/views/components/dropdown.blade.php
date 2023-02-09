@props(['trigger'])
<div x-data="{ show: false }" class="w-full" @click.away="show=false">
    <button @click="show = !show"
        class="appearance-none bg-transparent text-left pl-2 py-2 pr-7 text-sm font-semibold lg:w-32 w-full flex">
        {{ $trigger }}
        <x-down-arrow class="absolute pointer-events-none"></x-down-arrow>
    </button>
    {{ $slot }}
</div>
