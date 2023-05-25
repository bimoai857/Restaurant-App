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
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto ">
                <div class="flex justify-end m-2 p-2">
                    <a href="{{ route('admin.reservation.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">New Reservation</a>
                   </div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                First name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Last Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Telephone
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Reservation Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Table 
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Guest Number
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $reservation->first_name }}
                            </th>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $reservation->last_name }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $reservation->email }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $reservation->tel_number }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $reservation->res_date }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                              {{ $reservation->table->name }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $reservation->guest_number }}
                            </td>
                        </tr>
                        @endforeach
                      
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
