<x-layout>
    <x-breadcumbs :links="['Jobs' => route('jobs.index'), $job->title => '#']" class="mb-4"/>
    <x-job-board :job="$job" class="mb-4">
        <p class="text-sm text-slate-500 mb-4">
            {!! nl2br(e($job->description)) !!}
        </p>

        <a href="{{route('jobs.application.create', $job)}}" class="bg-black text-white px-3 py-1.5 font-bold  rounded-md shadow">Apply</a>
    </x-job-board>

    <x-card class="mb-4">
        <div class="text-2xl font-semibold mb-4">
            {{$job->employer->company_name}} Jobs
        </div>

        @foreach($job->employer->jobs as $otherJob)
            <a href="{{route('jobs.show', $otherJob)}}" class="flex justify-between items-center mb-4">
                <div>
                    <p class="font-semibold">{{$otherJob->title}}</p>
                    <p class="text-xs">{{$otherJob->created_at->diffForHumans()}}</p>
                </div>
                <div class="text-xs">
                    ${{number_format($otherJob->salary)}}
                </div>
            </a>
        @endforeach

    </x-card>
</x-layout>
