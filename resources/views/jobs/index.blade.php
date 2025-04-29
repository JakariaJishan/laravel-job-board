<x-layout>
    <x-breadcumbs :links="['Jobs' => route('jobs.index')]" class="mb-4"/>

    <x-card class="mb-4 text-sm">
        <form action="{{route('jobs.index')}}" method="GET" id="filtering-form">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" form-id="filtering-form" value="{{request('search')}}" placeholder="Search for job"/>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex items-center space-x-2">
                        <x-text-input name="min_salary" form-id="filtering-form" value="{{request('min_salary')}}" placeholder="From"/>
                        <x-text-input name="max_salary" form-id="filtering-form" value="{{request('max_salary')}}" placeholder="To"/>
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    <x-radio-group name="experience" :options="\App\Models\JobBoard::$experience"/>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>
                    <x-radio-group name="category" :options="\App\Models\JobBoard::$category"/>
                </div>
            </div>
            <button type="submit">Filter</button>
        </form>
    </x-card>

    @foreach($jobs as $job)
        <x-job-board class="mb-4" :$job>
            <a href="{{route('jobs.show', $job)}}" class="border border-slate-300 shadow px-2 py-1 rounded-md hover:bg-slate-100 bg-white">
                See More
            </a>
        </x-job-board>
    @endforeach
</x-layout>
