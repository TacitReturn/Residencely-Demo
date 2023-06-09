@extends("layouts.app")

@section("content")
    <a class="btn btn-primary m-2" href="{{ route('properties.create') }}">Create Property</a>
    <div class="m-2">
        <div class="">
            <div class="card">
                <div class="card-header">Deleted Properties</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Address</th>
                            <th scope="col">Images</th>
                            <th scope="col">SQFT</th>
                            <th scope="col"></th>
                            <th scope="col">Restore</th>
                            <th scope="col">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($properties as $property)
                            <tr>
                                <th scope="row">{{ $property->id }}</th>
                                <td>{{ $property->title }}</td>
                                <td>
                                    {{ $property->address }}
                                </td>
                                <td>
                                    @foreach ($property->images as $image)
                                        <img height="75" width="75" class="img-thumbnail"
                                             src="{{ asset("storage/" . $image->path) }}" alt="property image">
                                    @endforeach
                                    {{--                                    <img height="75" width="75" class="img-thumbnail" src="{{ $property->images->pluck("path")[0] }}" alt="property image">--}}
                                </td>
                                <td>
                                    {{ $property->sqft }}
                                </td>
                                <td>
                                <td>
                                    <form action="{{ route('properties.restore', $property->id) }}" method="POST">
                                        @method("PUT")
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-info text-white">Restore</button>
                                    </form>
                                </td>
                                </td>
                                <td>
                                    <form action="{{ route('properties.destroy', $property) }}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
