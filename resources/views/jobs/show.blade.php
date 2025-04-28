<x-layout>
    <x-breadcumbs :links="['Jobs' => route('jobs.index'), $job->title => '#']" class="mb-4"/>
    <x-job-board :$job/>
</x-layout>
