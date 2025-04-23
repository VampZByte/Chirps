<aside class="w-64 bg-gray-800 text-white h-full p-4">
    <ul>
        @foreach($links as $link)
            <li class="p-2 hover:bg-gray-700">
                <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
            </li>
        @endforeach
    </ul>
</aside>
