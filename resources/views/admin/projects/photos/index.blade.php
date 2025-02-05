@extends('layouts.admin')


@section('content')
    <div class="flex justify-center">
        <div class="container mt-5 px-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="p-4 my-4 rounded bg-red-600 text-white-900">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <a href="/admin/projects">
                <button type="submit"
                    class="text-white bg-red-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                    Return
                </button>
            </a>
            <form class="bg-white-900 px-8 py-4 rounded-md" method="POST" action="" enctype="multipart/form-data">
                @csrf
                <label class="mb-1 text-sm font-medium text-gray-900" for="user_avatar">
                    Upload Image
                </label>
                <input
                    class="block w-full  mb-1 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                    aria-describedby="user_avatar_help" id="user_avatar" type="file" name="photos[]" multiple>
                <div class="text-end">
                    <button type="submit"
                        class="text-white bg-black-900 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                        Save Image
                    </button>
                </div>
            </form>
            <p class="text-center font-bold text-2xl my-4">Project Photos</p>

            <div>
                <div class="grid grid-cols-3 gap-4 ">
                    @foreach ($media as $item)
                        <div class="container relative">
                            <img class="max-h-96 mx-auto object-cover object-center" src="{{ asset($item->url) }}"
                                alt="">
                            <form action="/admin/projects/{{ $project->id }}/photos/{{ $item->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="absolute top-1 right-3 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm p-1 me-2 mb-2">
                                    <svg class="w-5 h-5 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
