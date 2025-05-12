<div class="w-64 bg-gray-800 min-h-screen p-6 text-white text-lg"> <!-- w-64 = wider, text-lg = larger font -->
    <ul>
        @foreach ($links as $link)
            <li class="mb-4">
                <a href="{{ $link['url'] }}" class="block py-2 px-4 rounded hover:bg-gray-700 transition">
                    {{ $link['label'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
