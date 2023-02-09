<x-layout>
    @include('_header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div style="width: 800px;" class="mx-auto"><canvas id="acquisitions"></canvas></div>
        <script src="{{ Vite::asset('resources/js/charts/barchart.js') }}" type="module"></script>
    </main>
</x-layout>
