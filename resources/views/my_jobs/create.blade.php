<x-layout>
  <x-card>
    <h1 class="mb-4 text-lg font-medium">Create Job</h1>
    <form action="{{route('my-jobs.store')}}" method="POST">
      @csrf

      <div class="grid grid-cols-2 space-x-2">
        <div class="mb-4">
          <label for="title" class="mb-2 block text-sm font-medium text-slate-900">Title</label>
          <x-text-input type="text" name="title" />
        </div>
        <div class="mb-4 ">
          <label for="location" class="mb-2 block text-sm font-medium text-slate-900">Location</label>
          <x-text-input type="text" name="location" />
        </div>
        <div class="mb-4 col-span-2">
          <label for="salary" class="mb-2 block text-sm font-medium text-slate-900">Salary</label>
          <x-text-input type="number" name="salary" />
        </div>

        <div class="mb-4 col-span-2">
          <label for="description" class="mb-2 block text-sm font-medium text-slate-900">Description</label>
          <textarea name="description" class="w-full ring-1 ring-slate-300 rounded-md p-2" ></textarea>
        </div>

        <div>
          <div class="mb-2 block text-sm font-medium text-slate-900">Experience</div>
          <x-radio-group :allOptions="false" name="experience" :options="\App\Models\JobBoard::$experience" />
        </div>

        <div class="mb-4">
          <div class="mb-2 block text-sm font-medium text-slate-900">Category</div>
          <x-radio-group :allOptions="false" name="category" :options="\App\Models\JobBoard::$category" />
        </div>

      </div>

      <x-button class="w-full">Create</x-button>
    </form>
  </x-card>
</x-layout>