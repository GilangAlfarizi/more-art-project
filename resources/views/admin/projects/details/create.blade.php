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

        <form action="{{ route('projects.details.store', $project->id) }}" method="post">
            @csrf
            <div class="w-full bg-white-900 border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 font-lora">
                <x-button-close route="{{ route('projects.details.index', $project->id) }}" />
                <h5 class="text-xl font-bold text-gray-90 px-12 text-center">Assign Crew to {{ $project->title }}</h5>
                <div>
                    <select name="crew_id" class="form-control mt-8 block w-full border-gray-300 rounded-md shadow-sm">
                        <option>--Select Crew--</option>
                        @forelse ($crews as $crew)
                            <option value={{ $crew->id }}>{{ $crew->name }}</option>
                        @empty
                            <option>Tidak ada Crew</option>
                        @endforelse
                    </select>
                    <div>
                        <label for="role" class="block mb-2 text-lg font-medium text-gray-900 my-4">Role</label>
                        <input type="text" name="role"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
                <x-button-submit />
            </div>
        </form>
    </div>

@endsection
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
