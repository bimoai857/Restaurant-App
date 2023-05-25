<x-admin-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  @if (Session::has('warning'))
  <div x-data="{ show: true }" x-show="show" class="py-6">
      <button x-on:click="show = false" class="text-white w-full">
      <div class="bg-red-500 text-white p-4 rounded-md shadow-md">
          <p>{{ Session::get('warning') }}</p>
      </div>
      </button>
  </div>
@endif
  <div class="py-12">
      <div class="max-w-7xl mx-auto  sm:px-6 lg:px-8">
         <div class="flex p-2 ml-64 ">
          <a href="{{ route('admin.reservation.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Reservation Index</a>
         </div>
         <div class="m-2 p-2 ">
          <div class="max-w-md mx-auto">
              <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" action="{{ route('admin.reservation.store') }}">
                @csrf
                <div class="mb-4">
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="post-title">
                    First Name
                  </label>
                  <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('first_name') border-red-700 @enderror"
                    id="post-title" type="text" placeholder="Enter First Name" name="first_name"
                  >
                  @error('first_name')
                  <div class="text-sm text-red-700">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="post-image">
                    Last Name
                  </label>
                  <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('last_name') border-red-700 @enderror"
                    id="post-image" type="text" name="last_name" placeholder="Enter Last Name"
                  >
                  @error('last_name')
                  <div class="text-sm text-red-700">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="post-image">
                    Email
                  </label>
                  <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-700 @enderror"
                    id="post-image" type="email" name="email" placeholder="Enter Your Email"
                  >
                  @error('email')
                  <div class="text-sm text-red-700">{{ $message }}</div>
                  @enderror
                </div>
               
                <div class="mb-4">
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="post-image">
                    Telephone number
                  </label>
                  <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tel_number') border-red-700 @enderror"
                    id="post-image" type="number" name="tel_number" placeholder="Enter Your Telephone"
                  >
                  @error('tel_number')
                  <div class="text-sm text-red-700">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-4">
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="post-image">
                    Reservation Date
                  </label>
                  <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('res_date') border-red-700 @enderror"
                    id="post-image" type="datetime-local" name="res_date"
                  >
                  @error('res_date')
                  <div class="text-sm text-red-700">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-4" >
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                    Table
                  </label>
                  <select name='table_id'  class="form-multiselect block w-full @error('table_id') border-red-700 @enderror">
                    <option value="">Select a Table</option>
                  @foreach ($tables as $table)
            
                  <option value="{{ $table->id }}">{{ $table->name }} ({{$table->guest_number}} Guest Max)</option>
                  @endforeach
                  </select>
                  @error('table_id')
                  <div class="text-sm text-red-700">{{ $message }}</div>
                  @enderror
                </div>
                 
                <div class="mb-4">
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="post-image">
                    Guest Number
                  </label>
                  <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('guest_number') border-red-700 @enderror"
                    id="post-image" type="number" name="guest_number" placeholder="Enter Your Group Size"
                  >
                  @error('guest_number')
                  <div class="text-sm text-red-700">{{ $message }}</div>
                  @enderror
                </div>
               
              

              
                  <button
                    class=" bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline "
                    type="submit">
                    Store
                  </button>
              
              </form>
            </div>
            
         </div>
      </div>
  </div>
</x-admin-layout>
