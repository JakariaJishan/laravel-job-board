<x-layout>
    <x-breadcumbs class="mb-4" :links="['My applications'=> '#']"/>
    @forelse($applications as $application)
        <x-job-board :job="$application->job_board" class="mb-4">
            <div class="flex items-center justify-between text-xs text-slate-500">
                <div>
                    <div>
                        Applied {{$application->created_at->diffForHumans()}}
                    </div>
                    <div>
                        Other {{Str::plural('applicant', $application->job_board->job_applications_count -1)}}
                        {{$application->job_board->job_applications_count -1}}
                    </div>
                    <div>
                        Your asking salary {{number_format($application->expected_salary)}}
                    </div>
                    <div>
                        Average asking salary {{number_format($application->job_board->job_applications_avg_expected_salary)}}
                    </div>
                </div>
                <div>
                    <form action="{{route('my-job-applications.destroy', $application)}}" method="POST">
                        @csrf
                        @method('delete')
                        <x-button @class('bg-red-500')>Delete</x-button>
                    </form>
                </div>
            </div>
        </x-job-board>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                No job application yet
            </div>
            <div class="text-center">
                Go find some jobs <a class="text-indigo-500 hover:underline" href="{{route('jobs.index')}}">here!</a>
            </div>
        </div>
    @endforelse
</x-layout>
