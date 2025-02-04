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

        <form action="{{ $action }}" method="post">
            @csrf
            @if ($method === 'PUT')
                @method('PUT')
            @endif
            <div class="w-full bg-white-900 border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 font-lora">
                <x-button-close route="{{ route('crews.index') }}"></x-button-close>
                <h5 class="text-xl font-bold text-gray-90 px-12 text-center">{{ $title }}</h5>
                <div>
                    <label for="name" class="block mb-2 text-lg font-medium text-gray-900 my-4">Name</label>
                    <input type="text" id="name" name="name" value="{{ $name ?? '' }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <x-button-submit />
            </div>
        </form>
    </div>
@endsection
