<x-layout>
    <x-breadcumbs :links="['Jobs' => route('jobs.index'), 'My jobs' => '#']" class="mb-4" />
    <x-card>
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-medium">My Jobs</h1>
            <a href="{{ route('my-jobs.create') }}" class="bg-black px-2 py-1 rounded-md shadow  text-white">Create
                Job</a>
        </div>
        @forelse($jobs as $job)
            <x-job-board :$job class="mb-4">
                <div class="text-xs text-slate-500">
                    @forelse($job->job_applications as $jobApplication)
                        <div class="mb-4 flex items-center justify-between">
                            <div>
                                <div>{{ $jobApplication->user->name }}</div>
                                <div>Applied {{ $jobApplication->created_at->diffForHumans() }}</div>
                                <button type="button" class="mt-1 bg-black px-2 py-1 rounded-md shadow  text-white">Download CV
                                    </bu>
                            </div>
                            <div></div>
                        </div>
                    @empty
                        <div>No application yet</div>
                    @endforelse
                </div>
            </x-job-board>
        @empty
            <div>No job list found</div>
        @endforelse
    </x-card>
</x-layout>