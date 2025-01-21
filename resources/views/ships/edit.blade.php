@extends('ships.layout')

@section('content')

    <div class="card mt-5">
        <h2 class="card-header">Edit ship</h2>
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

            <form action="{{ route('ships.update', $ship->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="inputName" class="form-label"><strong>Title:</strong></label>
                    <input
                        type="text"
                        name="title"
                        value="{{ $ship->title }}"
                        class="form-control @error('title') is-invalid @enderror"
                        id="inputName"
                        placeholder="Title">
                    @error('title')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputDetail" class="form-label"><strong>Spec:</strong></label>
                    <textarea
                        class="form-control @error('spec') is-invalid @enderror"
                        style="height:150px"
                        name="spec"
                        id="inputDetail"
                        placeholder="Spec">{{ $ship->spec }}</textarea>
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
                        placeholder="Description">{{ $ship->description }}</textarea>
                    @error('description')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
            </form>
        </div>
    </div>

    <div class="card mt-5">
        <h2 class="card-header">Edit cabin</h2>
        <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-5">
                <a class="btn btn-success btn-sm" href="{{ route('cabin.create', ['ship_id' => $ship->id]) }}"> <i class="fa fa-plus"></i> Create new cabin</a>
            </div>
            <label for="inputDetail" class="form-label"><strong>Cabin:</strong></label>
            @forelse ($ship->cabin as $cabin)
                <div class="card-body">
                    <form action="{{ route('cabin.update', $cabin->id) }}" method="POST">
                        <input type="hidden" name="ship_id" value="{{ $ship->id }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="inputDetail" class="form-label"><strong>Cabin vendor code:</strong></label>
                            <input
                                type="text"
                                name="vendor_code"
                                value="{{ $cabin->vendor_code }}"
                                class="form-control"
                                id="inputName"
                                placeholder="Vendor code">
                        </div>
                        <div class="mb-3">
                            <label for="inputDetail" class="form-label"><strong>Cabin title:</strong></label>
                            <input
                                type="text"
                                name="title"
                                value="{{ $cabin->title }}"
                                class="form-control"
                                id="inputName"
                                placeholder="Title">
                        </div>
                        <div class="mb-3">
                            <label for="inputDetail" class="form-label"><strong>Cabin type:</strong></label>
                            <input
                                type="text"
                                name="type"
                                value="{{ $cabin->type }}"
                                class="form-control"
                                id="inputName"
                                placeholder="Type">
                        </div>
                        <div class="mb-3">
                            <label for="inputDetail" class="form-label"><strong>Cabin description:</strong></label>
                            <textarea
                                class="form-control"
                                style="height:150px"
                                name="description"
                                id="inputDetail"
                                placeholder="Description">{{ $cabin->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa-solid fa-floppy-disk"></i> Update</button>
                    </form>
                    <form action="{{ route('cabin.destroy',$cabin->id) }}" method="POST" style="margin-top: 15px;">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="ship_id" value="{{ $ship->id }}">
                        <button onclick="return confirm('Are you sure you want to delete this item?');" type="submit"
                                class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
                @error('cabin-description')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            @empty
                <td>There are no data.</td>
            @endforelse
        </div>
    </div>
@endsection
