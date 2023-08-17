@extends('layouts.admin')

@section('content')

    <div>
        <h1 class="text-center">{{ $user->name }}</h1>
        <a class="btn btn-warning mb-3" href="{{ route('admin.user.edit', $user->id) }}">Edit</a>
        <form method="POST" action="{{ route('admin.user.delete', $user->id) }}"
              class="d-inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mb-3"
                    onclick="return confirm('Are you sure?')">Delete
            </button>
        </form>
        <table class="table">
            <thead>
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Password</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th class="text-center" scope="row">{{ $user->id }}</th>
                <td class="text-center">{{ $user->name }}</td>
                <td class="text-center">{{ $user->email }}</td>
                <td class="text-center">{{ $user->role }}</td>
                <td class="text-center">{{ $user->password }}</td>
            </tr>
            </tbody>
        </table>

    </div>
@endsection
