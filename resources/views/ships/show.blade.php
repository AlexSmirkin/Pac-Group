@extends('ships.layout')

@section('content')

    <div class="card mt-5">
        <h2 class="card-header">Show ship</h2>
        <div class="card-body">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary btn-sm" href="{{ route('ships.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong> <br/>
                        {{ $ship->title }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Spec:</strong> <br/>
                        {!! $ship->getSpecHtml() !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Description:</strong> <br/>
                        {!! $ship->description !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Ships gallery:</strong> <br/>
                        <table class="table table-bordered table-striped mt-4">
                            <tr>
                                @forelse ($ship->gallery as $gallery)
                                    <td>
                                        <img src="{{$gallery->url}}" style="width: 100%" alt="{{$gallery->title}}"
                                             title="{{$gallery->title}}">
                                    </td>
                                @empty
                                    <td>There are no data.</td>
                                @endforelse
                            </tr>
                        </table>
                    </div>
                </div>
                <strong>Cabin:</strong> <br/>
                @forelse ($ship->cabin as $cabin)
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <div class="form-group">
                            <table class="table table-bordered table-striped mt-4">
                                <tr>
                                    <td>
                                        <strong>{{ $cabin->title }}({{$cabin->vendor_code}} {{$cabin->type}})</strong> <br/> <br/>
                                        {!! $cabin->description !!}
                                        <img src="{{$cabin->getOnePhotoUrl()}}" style="width: 100%">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                @empty
                    <td>There are no data.</td>
                @endforelse
            </div>

        </div>
    </div>
@endsection
