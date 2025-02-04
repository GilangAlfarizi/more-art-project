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

        <form action="{{ route('projects.destroy', $project->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="lg:mx-28 bg-white-900 border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 text-center font-lora">
                <x-button-close route="{{ route('projects.index') }}" />
                <h5 class="text-xl font-bold text-gray-90 px-12">Delete Project</h5>
                <p class="text-xl font-bold">
                    {{ $project->title }} ?
                </p>
                <div class="flex justify-center mx-8 pt-8 align-middle">
                    <button type="submit"
                        class="text-white-900 bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-md px-5 py-2.5 text-center">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
