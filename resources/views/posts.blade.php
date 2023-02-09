<x-layout>
    {{-- <x-layout>
        @foreach ($posts as $post)
            <article>
                <h1><a href="/post/{{ $post->slug }}">{{ $post->title }}</a></h1>
                <p>
                    By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>
                    <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                </p>
                <p>
                    {{ $post->excerpt }}
                </p>
            </article>
        @endforeach
    </x-layout> --}}
    @include('_header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-feature-card :post="$posts[0]" />

            <div class="lg:grid lg:grid-cols-6 ">
                @foreach ($posts->skip(1) as $post)
                    <x-post-card :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />
                @endforeach
            </div>
        @else
            <p class="text-center">
                There are no posts yet.
            </p>
        @endif

    </main>
</x-layout>
