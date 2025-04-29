<nav {{$attributes}}>
    <ul class="flex items-center space-x-2 font-semibold">
        <li>
            <a href="{{route('jobs.index')}}" class="hover:underline">Home</a>
        </li>
        @foreach($links as $label => $link)
            <li> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>
            </li>
            <li>
                <a href="{{$link}}" class="hover:underline">{{$label}}</a>
            </li>
        @endforeach

    </ul>
</nav>
