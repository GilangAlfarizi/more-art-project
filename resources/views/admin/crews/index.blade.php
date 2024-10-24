@extends('layouts.admin')

@section('content')
    <div class="flex justify-center">
        <div class="container mt-5 px-10">
            <p class="text-center font-bold text-2xl my-4">Crews</p>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 flex justify-center">
                                <span>Action</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($crews as $crew)
                            <tr
                                class="bg-gray-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 align-middle">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $crew->id }}
                                </th>
                                <td class="px-6 py-4 text-gray-900">
                                    {{ $crew->name }}
                                </td>
                                <td class="flex py-2 space-x-3 justify-center">
                                    <a href="">
                                        <button type="button"
                                            class="text-white-900 bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:focus:ring-yellow-900">
                                            Detail
                                        </button>
                                    </a>
                                    <a href="{{ route('crews.edit', $crew->id) }}">
                                        <button type="button"
                                            class="text-white-900 bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:focus:ring-yellow-900">
                                            Update
                                        </button>
                                    </a>
                                    <a href="{{ route('crews.destroy', $crew->id) }}">
                                        <button type="button"
                                            class="text-white-900 bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                            Delete
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Crew data is empty.
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <a href="{{ route('crews.create') }}">
                    <button type="button"
                        class="text-white-900 bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Create
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
