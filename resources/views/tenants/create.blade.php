@extends("layouts.app")
@section("content")
    <x-alert></x-alert>
    <div class="p-5">
        <form action="{{ route('tenants.store') }}" method="POST">
            @csrf
            <h1>Create Tenant</h1>
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="first_name">
                            First Name
                        </label>
                        <input name="first_name" type="text" id="first_name" class="form-control" value="{{ old('first_name') }}"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="last_name">
                            Last Name
                        </label>
                        <input name="last_name" type="text" id="last_name" class="form-control" value="{{ old('last_name') }}"/>
                    </div>
                </div>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="property">
                    Property
                </label>
                <select name="property[]" class="form-select" aria-label="Default select example">
                    @foreach($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->title }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">
                Create Property
            </button>
        </form>
    </div>
@endsection
