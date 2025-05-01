<x-layout>
    <x-card>
        <div class="flex justify-between items-center mb-4">
            <h1 class="">My Jobs</h1>
            <a href="{{ route('my-jobs.create') }}">Create Job</a>
        </div>
        @forelse($jobs as $job)
            <x-job-board :$job class="mb-4" >
                <button>Edit</button>
                <button>Delete</button>
            </x-job-board>
        @empty
            <div>No job list found</div>
        @endforelse
    </x-card>
</x-layout>