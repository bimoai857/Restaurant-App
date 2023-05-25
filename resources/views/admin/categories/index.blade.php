<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

        @if (Session::has('created'))
        <div x-data="{ show: true }" x-show="show" class="py-6">
            <button x-on:click="show = false" class="text-white w-full">
            <div class="bg-blue-500 text-white p-4 rounded-md shadow-md">
                <p>{{ Session::get('created') }}</p>
            </div>
            </button>
        </div>
        @elseif (Session::has('edited'))
        <div x-data="{ show: true }" x-show="show" class="py-6">
            <button x-on:click="show = false" class="text-white w-full">
            <div class="bg-green-500 text-white p-4 rounded-md shadow-md">
                <p>{{ Session::get('edited') }}</p>
            </div>
            </button>
        </div>
        @elseif (Session::has('deleted'))
        <div x-data="{ show: true }" x-show="show" class="py-6">
            <button x-on:click="show = false" class="text-white w-full">
            <div class="bg-red-500 text-white p-4 rounded-md shadow-md">
                <p>{{ Session::get('deleted') }}</p>
            </div>
            </button>
        </div>
        @endif   

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="flex justify-end m-2 p-2">
            <a href="{{ route('admin.categories.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">New Category</a>
           </div>
<div class="relative overflow-x-auto rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Category Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category )
       
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $category->name }}
                </th>
                <td class="px-6 py-4">
                    <img src="{{ Storage::url($category->image) }}" class="w-16 h-16 rounded"/>
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{ $category->description }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  <a href="{{ route('admin.categories.edit',$category->id) }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
                 </td>
                 <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <form action="{{ route('admin.categories.destroy',$category->id) }}" 
                        class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white w-20" 
                        method="post"
                        onsubmit="return confirm('Are you sure?');"
                        >
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button></form>
                   </td>
                
            </tr>
          
            @endforeach
           
        </tbody>
    </table>
</div>

        </div>
    </div>
</x-admin-layout>
