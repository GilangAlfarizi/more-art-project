@extends('layouts.admin')


@section('content')
    <div class="px-80">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="p-4 my-4 rounded bg-red-600 text-white-900">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('projects.update', $project->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="w-full bg-white-900 border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 font-lora">
                <x-button-close route="{{ route('projects.index') }}" />
                <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 text-center">
                    Update Project
                </h5>
                <div class="form-group mb-4">
                    <label class="block mb-2 text-lg font-medium text-gray-900 my-4">Category</label>
                    <select name="category_id" class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">--Pilih Category--</option>
                        @forelse ($categories as $category)
                            @if ($category->id === $project->category_id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @empty
                            <option value="">Tidak ada Category</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label class="block mb-2 text-lg font-medium text-gray-900 my-4">Title</label>
                    <input type="text" name="title" value="{{ $project->title }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div class="form-group mb-4">
                    <label class="block mb-2 text-lg font-medium text-gray-900 my-4">Description</label>
                    <textarea name="description" class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm" cols="30"
                        rows="4">{{ $project->description }}</textarea>
                </div>
                <div class="form-group mb-4">
                    <label class="block mb-2 text-lg font-medium text-gray-900 my-4">Video URL</label>
                    <input type="text" name="videoUrl" value="{{ $project->videoUrl }}"
                        class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="form-group mb-4">
                    <label class="block mb-2 text-lg font-medium text-gray-900 my-4">Client</label>
                    <input type="text" name="client" value="{{ $project->client }}"
                        class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="form-group mb-4">
                    <label class="block mb-2 text-lg font-medium text-gray-900 my-4">Agency</label>
                    <input type="text" name="agency" value="{{ $project->agency }}"
                        class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="form-group mb-4">
                    <label class="block mb-2 text-lg font-medium text-gray-900 my-4">PH</label>
                    <input type="text" name="ph" value="{{ $project->ph }}"
                        class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="form-group mb-4">
                    <a href="/admin/projects/{{ $project->id }}/photos"
                        class="text-white-900 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">Project
                        Photos</a>
                </div>
                <x-button-submit />
            </div>
        </form>
    </div>


@endsection

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
