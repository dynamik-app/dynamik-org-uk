@props(['links'])

<nav class="text-sm font-medium text-gray-500 mb-4 px-6 sm:px-0">
    <ol class="flex items-center space-x-2">
        @foreach($links as $link)
            <li>
                @if(isset($link['url']))
                    <a href="{{ $link['url'] }}" class="hover:text-gray-700">{{ $link['label'] }}</a>
                @else
                    <span class="text-gray-900">{{ $link['label'] }}</span>
                @endif
            </li>
            @if(!$loop->last)
                <li>
                    <span class="text-gray-400">/</span>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
