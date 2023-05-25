<x-admin-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto  sm:px-6 lg:px-8">
         <div class="flex p-2 ml-64 ">
          <a href="{{ route('admin.tables.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Table Index</a>
         </div>
         <div class="m-2 p-2 ">
          <div class="max-w-md mx-auto">
              <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" action="{{ route('admin.tables.update',$table->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="post-title">
                    Name
                  </label>
                  <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="post-title" type="text" placeholder="Enter Category Name" name="name" value="{{ $table->name }}"
                  >
                  @error('name')
                  <div class="text-sm text-red-700">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="post-image">
                    Guest Number
                  </label>
                  <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-700 @enderror"
                    id="post-image" type="number" name="guest_number" value="{{ $table->guest_number }}"
                  >
                  @error('guest_number')
                  <div class="text-sm text-red-700">{{ $message }}</div>
                  @enderror
                </div>
               
                <div class="mb-4" >
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                    Status
                  </label>
                  <select name='status'  class="form-multiselect block w-full ">
                    <option value="">Select a Status</option>
                  @foreach (App\Enums\TableStatus::cases() as $status)
            
                  <option value="{{ $status }}" @selected($status==$table->status)>{{ $status }}</option>
                  @endforeach
                  
                  </select>
                </div>

                <div class="mb-4" >
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                    Location
                  </label>
                  <select name='location'  class="form-multiselect block w-full ">
                    <option value="">Select a location</option>
                  @foreach (App\Enums\TableLocation::cases() as $location)
            
                  <option value="{{ $location }}" @selected($location==$table->location)>{{ $location }}</option>
                  @endforeach
                  
                  </select>
                </div>
              
                  <button
                    class=" bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline"
                    type="submit">
                    Store
                  </button>
              
              </form>
            </div>
            
         </div>
      </div>
  </div>
</x-admin-layout>
