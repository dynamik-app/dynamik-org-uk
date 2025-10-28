<div class="bg-gray-50 py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <header class="mb-12 text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl">
                {{ $solution->name }}
            </h1>
            <p class="mt-4 text-lg text-gray-600">
                {{ $solution->description }}
            </p>
        </header>

        <article class="prose prose-lg prose-blue max-w-none">
            @if($solution->content)
                {!! $solution->content !!}
            @else
                <p>This solution overview is being prepared. Please check back soon.</p>
            @endif
        </article>

        <div class="mt-16 text-center">
            <a href="{{ route('solutions') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                ← Back to Solutions
            </a>
        </div>
    </div>
</div>
