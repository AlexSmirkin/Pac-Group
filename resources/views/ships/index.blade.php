@extends('ships.layout')

@section('content')
    <div class="card mt-5">
        <h2 class="card-header">Pac Group</h2>
        <div class="card-body">

            @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession

            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <h1>Ships</h1>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success btn-sm" href="{{ route('ships.create') }}"> <i class="fa fa-plus"></i> Create New Ship</a>
            </div>

            <table class="table table-bordered table-striped mt-4">
                <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="10%">Title</th>
                    <th width="20%">Spec</th>
                    <th width="45%">Description</th>
                    <th width="20%"></th>
                </tr>
                </thead>

                <tbody>
                @forelse ($ships as $ship)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $ship->title }}</td>
                        <td>{!! $ship->getSpecHtml() !!}</td>
                        <td>{!! $ship->description !!}</td>
                        <td>
                            <form action="{{ route('ships.destroy',$ship->id) }}" method="POST">

                                <a class="btn btn-info btn-sm" href="{{ route('ships.show',$ship->id) }}"><i class="fa-solid fa-list"></i>
                                    Show</a>

                                <a class="btn btn-primary btn-sm" href="{{ route('ships.edit',$ship->id) }}"><i
                                        class="fa-solid fa-pen-to-square"></i> Edit</a>

                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Are you sure you want to delete this item?');" type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <table class="table table-bordered table-striped mt-4">
                                <tr>
                                    @forelse ($ship->gallery as $gallery)
                                        <td>
                                            <img src="{{$gallery->url}}" style="width: 100%" alt="{{$gallery->title}}" title="{{$gallery->title}}">
                                        </td>
                                    @empty
                                        <td>There are no data.</td>
                                    @endforelse
                                </tr>
                            </table>
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
