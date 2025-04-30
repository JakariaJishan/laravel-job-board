<article {{$attributes->class(['bg-white text-slate-800 border border-slate-300 p-4 rounded-md shadow'])}}>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">{{$job->title}}</h2>
        <p class="font-semibold">$ {{number_format($job->salary)}}</p>
    </div>

    <div class="flex justify-between items-center mb-4">
        <div class="flex items-center space-x-2 font-semibold text-slate-500">
            <div>{{$job->employer->company_name}}</div>
            <div>{{$job->location}}</div>
        </div>
        <div class="flex items-center space-x-1 text-xs font-semibold">
            <x-tag>{{Str::ucfirst($job->experience)}}</x-tag>
            <x-tag>{{Str::ucfirst($job->category)}}</x-tag>
        </div>
    </div>

    <p class="text-sm text-slate-500 mb-4">
        {!! nl2br(e($job->description)) !!}
    </p>
    {{$slot}}
</article>
