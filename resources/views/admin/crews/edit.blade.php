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
        <x-form-crew action="{{ route('crews.update', $crew->id) }}" method="PUT" title="Update Crew"
            name="{{ $crew->name }}" />
    </div>

@endsection
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
