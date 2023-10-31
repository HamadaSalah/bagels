@extends('Admin.master')
@section('content')
<a href="{{route('admin.admins.create')}}">
    <button class="btn btn-primary mb-4">Add New User</button>
</a>
<div class="table-responsive">
    <table class="table user-table no-wrap">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0"> Name</th>
                <th class="border-top-0">Email</th>
                <th class="border-top-0">Role</th>
                <th class="border-top-0">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            <tr>
                <td>{{$admin->id}}</td>
                <td>{{$admin->name}}</td>
                <td>{{$admin->email}}</td>
                <td>{{$admin->roles->pluck('name')}}</td>
                <td>
                    <button class="btn btn-danger">Delete</button>
                    <a href="{{Route('admin.admins.edit', $admin->id)}}">
                        <button class="btn btn-success">Edit</button>
                    </a>
                </td>

            </tr>

            @endforeach
        </tbody>
    </table>
    {{ $admins->links() }}
</div>
@endsection
