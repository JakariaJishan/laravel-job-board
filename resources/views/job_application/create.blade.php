<x-layout>
    <x-breadcumbs :links="[
    'Jobs' => route('jobs.index'),
     $job->title=>route('jobs.show', $job),
      'Apply'=>'#'
      ]" class="mb-4"/>

    <x-job-board :$job class="mb-4"/>

    <x-card>
        <h1 class="mb-4 text-lg font-medium">Your job application</h1>
        <form action="{{route('jobs.application.store', $job)}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="expected_salary" class="mb-2 block text-sm font-medium text-slate-900">Expected Salary</label>
                <x-text-input type="number" name="expected_salary"/>
            </div>
            <div class="mb-4">
                <label for="cv" class="mb-2 block text-sm font-medium text-slate-900">Upload CV</label>
                <x-text-input type="file" name="cv"/>
            </div>

            <x-button class="w-full">Apply</x-button>
        </form>
    </x-card>
</x-layout>
