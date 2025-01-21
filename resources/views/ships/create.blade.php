@extends('ships.layout')

@section('content')

    <div class="card mt-5">
        <h2 class="card-header">Create ship</h2>
        <div class="card-body">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                <a class="btn btn-primary btn-sm" href="{{ route('ships.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
            </div>

            @session('success')
            <div class="alert alert-success mt-5" role="alert"> {{ $value }} </div>
            @endsession

            @if ($errors->any())
                <div class="alert alert-danger mt-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('ships.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="inputName" class="form-label"><strong>Title:</strong></label>
                    <input
                        type="text"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        id="inputName"
                        placeholder="Title">
                    @error('title')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputDetail" class="form-label"><strong>Spec(Example: [{"name": "Год постройки", "value": "2004"}, {"name": "Год реновации", "value": "2014"}]):</strong></label>
                    <textarea
                        class="form-control @error('spec') is-invalid @enderror"
                        style="height:150px"
                        name="spec"
                        id="inputDetail"
                        placeholder="Spec"></textarea>
                    @error('spec')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputDetail" class="form-label"><strong>Description:</strong></label>
                    <textarea
                        class="form-control @error('description') is-invalid @enderror"
                        style="height:150px"
                        name="description"
                        id="inputDetail"
                        placeholder="Description"></textarea>
                    @error('description')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Create</button>
            </form>
        </div>
    </div>
@endsection
