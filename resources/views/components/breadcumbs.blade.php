<nav {{$attributes}}>
    <ul class="flex items-center space-x-2">
        <li>
            <a href="{{route('jobs.index')}}" class="hover:underline">Home</a>
        </li>
        @foreach($links as $label => $link)
            <li> / </li>
            <li>
                <a href="{{$link}}" class="hover:underline">{{$label}}</a>
            </li>
        @endforeach

    </ul>
</nav>
