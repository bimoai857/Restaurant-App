<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto  sm:px-6 lg:px-8">
           <div class="flex p-2 ml-64 ">
            <a href="{{ route('admin.menus.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Menu Index</a>
           </div>
           <div class="m-2 p-2 ">
            <div class="max-w-md mx-auto">
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" action="{{ route('admin.menus.update',$menu->id) }} " enctype="multipart/form-data">
                 @csrf
                 @method('PUT')
                  <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="post-title">
                      Name
                    </label>
                    <input
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-700 @enderror"
                      id="post-title" type="text" placeholder="Enter Category Name" name='name' value="{{ $menu->name }}"
                    >
                    @error('name')
                    <div class="text-sm text-red-700">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="post-image">
                      Post Image
                    </label>
                    <div>
                        <img class="w-12 h-12" src="{{ Storage::url($menu->image) }}"/>
                    </div>
                    <input
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="post-image" type="file" name="image" 
                    >
                  </div>
                 
                  <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="post-image">
                      Price
                    </label>
                    <input
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('price') border-red-700 @enderror"
                      id="post-image" type="number" min="0.00" max='10000.0' step="0.01" name="price" value="{{ $menu->price }}"
                    >
                    @error('price')
                    <div class="text-sm text-red-700">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                      Description
                    </label>
                    <textarea
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-700 @enderror"
                      id="body" placeholder="Enter Category Description" name="description">{{ $menu->description }}</textarea>
                      @error('description')
                      <div class="text-sm text-red-700">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="mb-4" >
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                      Categories
                    </label>
                    <select name='categories[]' multiple class="form-multiselect block w-full ">
                    
                      @foreach ($categories as $category)
                      <option value="{{ $category->id }}" @selected($menu->categories->contains($category))>{{ $category->name }}</option>
                      @endforeach
                     
                    </select>
                    
                  </div>
                    <button
                      class=" bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline"
                      type="submit">
                      Update
                    </button>
                
                </form>
              </div>
              
           </div>
        </div>
    </div>
</x-admin-layout>
