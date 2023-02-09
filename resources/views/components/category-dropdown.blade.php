<x-dropdown>

    <x-slot name="trigger">
        {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
    </x-slot>
    <div x-show="show"
        class="flex absolute flex-col text-left w-full py-3 bg-gray-200 rounded-xl text-sm z-50 max-h-60 overflow-auto"
        style="display: none">
        <x-dropdown-item href="/" :active="!request('category')">
            All
        </x-dropdown-item>
        @foreach ($categories as $category)
            <x-dropdown-item href="/?category={{ $category->slug }}" :active="isset($currentCategory) && $currentCategory->is($category)">
                {{ ucwords($category->name) }}
            </x-dropdown-item>
        @endforeach
    </div>
</x-dropdown>
