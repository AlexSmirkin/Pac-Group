@extends('ships.layout')

@section('content')
    <div class="card mt-5">
        <h2 class="card-header">Pac Group</h2>
        <div class="card-body">

            @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession

            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <h1>Gallery</h1>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success btn-sm" href="{{ route('ships.create') }}"> <i class="fa fa-plus"></i> Create new image</a>
            </div>

            <table class="table table-bordered table-striped mt-4">
                <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="10%">Ship id</th>
                    <th width="15%">Title</th>
                    <th width="5%">Ordering</th>
                    <th width="40%">Image</th>
                    <th width="25%"></th>
                </tr>
                </thead>

                <tbody>
                @forelse ($gallery as $image)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $image->ship_id }}</td>
                        <td>{{ $image->title }}</td>
                        <td>{{ $image->ordering }}</td>
                        <td><img src="{{$image->url}}" style="width: 100%" alt="{{$image->title}}" title="{{$image->title}}"></td>
                        <td>
                            <form action="{{ route('gallery.destroy',$image->id) }}" method="POST">

                                <a class="btn btn-primary btn-sm" href="{{ route('gallery.edit',$image->id) }}"><i
                                        class="fa-solid fa-pen-to-square"></i> Edit</a>

                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Are you sure you want to delete this item?');" type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">There are no data.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
