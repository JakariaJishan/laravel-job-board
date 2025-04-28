<x-layout>
    <x-breadcumbs :links="['Jobs' => route('jobs.index')]" class="mb-4"/>

    <x-card class="mb-4 text-sm">
        <form action="{{route('jobs.index')}}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" value="{{request('search')}}" placeholder="Search for job"/>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex items-center space-x-2">
                        <x-text-input name="min_salary" value="{{request('min_salary')}}" placeholder="From"/>
                        <x-text-input name="max_salary" value="{{request('max_salary')}}" placeholder="To"/>
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    <label for="experience" class="mb-1 flex items-center">
                        <input type="radio" name="experience" value="" @checked(!request('experience'))/>
                        <span class="ml-2">All</span>
                    </label>
                    <label for="experience" class="mb-1 flex items-center">
                        <input type="radio" name="experience" value="entry" @checked('entry' === request('experience'))/>
                        <span class="ml-2">Entry</span>
                    </label>
                    <label for="experience" class="mb-1 flex items-center">
                        <input type="radio" name="experience" value="intermediate" @checked('intermediate' === request('experience'))/>
                        <span class="ml-2">Intermediate</span>
                    </label>
                    <label for="experience" class="mb-1 flex items-center">
                        <input type="radio" name="experience" value="senior" @checked('senior' === request('experience'))/>
                        <span class="ml-2">Senior</span>
                    </label>
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
