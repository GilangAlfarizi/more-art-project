@extends('layouts.admin')


@section('content')

<div class="flex justify-center items-center mt-8">
  @if($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li> 
              @endforeach
          </ul>
      </div>
  @endif

  <form action="{{ route('projects.update', $project->id) }}" method="post">
      @csrf
      @method('PUT')
      <div class="w-full max-w-sm bg-white-900 border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
        <a href="{{route('projects.index')}}">
            <div class="flex justify-center mb-6">
              <svg class="w-[45px] h-[45px] text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
              </svg>            
            </div>
        </a>
        <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            Update Project
        </h5>
        <div class="form-group mb-4">
            <label class="block mb-2 text-lg font-medium text-gray-900 my-4">Category</label>
            <select name="categoryId" class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="">--Pilih Category--</option>
                @forelse ($categories as $category)
                    @if ($category->id === $project->categoryId)
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
            <input type="text" name="title" value="{{ $project->title }}" class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div class="form-group mb-4">
            <label class="block mb-2 text-lg font-medium text-gray-900 my-4">Description</label>
            <textarea name="description" class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm" cols="30" rows="4">{{ $project->description }}</textarea>
        </div>
        <div class="form-group mb-4">
            <label class="block mb-2 text-lg font-medium text-gray-900 my-4">Video URL</label>
            <input type="text" name="videoUrl" value="{{ $project->videoUrl }}" class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div class="form-group mb-4">
            <label class="block mb-2 text-lg font-medium text-gray-900 my-4">Client</label>
            <input type="text" name="client" value="{{ $project->client }}" class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div class="form-group mb-4">
            <label class="block mb-2 text-lg font-medium text-gray-900 my-4">Agency</label>
            <input type="text" name="agency" value="{{ $project->agency }}" class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div class="form-group mb-4">
            <label class="block mb-2 text-lg font-medium text-gray-900 my-4">PH</label>
            <input type="text" name="ph" value="{{ $project->ph }}" class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div class="text-center mt-6">
            <input type="submit" class="text-white-900 bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-md px-5 py-2.5 text-center" value="Submit">
        </div>
      </div>
  </form>
</div>


@endsection

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>