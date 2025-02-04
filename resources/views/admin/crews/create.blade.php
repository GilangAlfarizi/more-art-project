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
        <x-form-crew action="{{ route('crews.store') }}" method="POST" title="Create Crew" />
    </div>
@endsection
