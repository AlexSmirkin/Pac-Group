@extends('ships.layout')

@section('content')

    <div class="card mt-5">
        <h2 class="card-header">Create cabin</h2>
        <div class="card-body">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                <a class="btn btn-primary btn-sm" href="{{ route('ships.edit', $ship_id) }}"><i class="fa fa-arrow-left"></i> Back</a>
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

            <form action="{{ route('cabin.store') }}" method="POST">
                @csrf
                <input type="hidden" name="ship_id" value="{{ $ship_id }}">
                <div class="mb-3">
                    <label for="inputDetail" class="form-label"><strong>Cabin vendor code:</strong></label>
                    <input
                        type="text"
                        name="vendor_code"
                        class="form-control"
                        id="inputName"
                        placeholder="Vendor code">
                </div>
                <div class="mb-3">
                    <label for="inputDetail" class="form-label"><strong>Cabin title:</strong></label>
                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        id="inputName"
                        placeholder="Title">
                </div>
                <div class="mb-3">
                    <label for="inputDetail" class="form-label"><strong>Cabin type:</strong></label>
                    <input
                        type="text"
                        name="type"
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
                        placeholder="Description"></textarea>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Create</button>
            </form>
        </div>
    </div>
@endsection
