@extends('ships.layout')

@section('content')

    <div class="card mt-5">
        <h2 class="card-header">Edit image</h2>
        <div class="card-body">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                <a class="btn btn-primary btn-sm" href="{{ route('gallery.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
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

            <form action="{{ route('gallery.update', $gallery->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="inputName" class="form-label"><strong>Ship id:</strong></label>
                    <input
                        type="text"
                        name="ship_id"
                        value="{{ $gallery->ship_id }}"
                        class="form-control @error('ship_id') is-invalid @enderror"
                        id="inputName"
                        placeholder="Ship id">
                    @error('ship_id')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName" class="form-label"><strong>Title:</strong></label>
                    <input
                        type="text"
                        name="title"
                        value="{{ $gallery->title }}"
                        class="form-control @error('title') is-invalid @enderror"
                        id="inputName"
                        placeholder="Title">
                    @error('ordering')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName" class="form-label"><strong>Ordering:</strong></label>
                    <input
                        type="text"
                        name="ordering"
                        value="{{ $gallery->ordering }}"
                        class="form-control @error('ordering') is-invalid @enderror"
                        id="inputName"
                        placeholder="Ordering">
                    @error('ordering')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputDetail" class="form-label"><strong>Image:</strong></label><br>
                    <img src="{{$gallery->url}}" style="width:25%" alt="{{$gallery->title}}" title="{{$gallery->title}}">
                    @error('spec')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button onclick="return alert('Image uploaded successfully');" class="btn btn-primary"><i class="fa-solid fa-trash"></i> Upload image</button>
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
            </form>
        </div>
    </div>
@endsection
