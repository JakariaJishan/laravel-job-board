<x-layout>
    <x-breadcumbs :links="[
    'Jobs' => route('jobs.index'),
      'Create Company'=>'#'
      ]" class="mb-4"/>

    <x-card>
        <h1 class="mb-4 text-lg font-medium">Create your company</h1>
        <form action="{{route('employer.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="company_name" class="mb-2 block text-sm font-medium text-slate-900">Company Name</label>
                <x-text-input type="text" name="company_name"/>
            </div>

            <x-button class="w-full">Create</x-button>
        </form>
    </x-card>
</x-layout>
