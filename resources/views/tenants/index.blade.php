@extends("layouts.app")
@section("content")
<a class="btn btn-primary m-2" href="{{ route('tenants.create') }}">Create Tenant</a>
<div class="m-2">
    <div class="">
        <div class="card">
            <div class="card-header">Tenants</div>
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
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tenants as $tenant)
                        <tr>
                            <th scope="row">{{ $tenant->id }}</th>
                            <td>{{ $tenant->first_name }}</td>
                            <td>
                                {{ $tenant->last_name }}
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
