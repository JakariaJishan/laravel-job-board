<x-layout>
    <x-breadcumbs :links="['Jobs' => route('jobs.index')]" class="mb-4"/>

    @foreach($jobs as $job)
        <x-card class="mb-4" :$job>
            <a href="{{route('jobs.show', $job)}}" class="border border-slate-300 shadow px-2 py-1 rounded-md hover:bg-slate-100 bg-white">
                See More
            </a>
        </x-card>
    @endforeach
</x-layout>
