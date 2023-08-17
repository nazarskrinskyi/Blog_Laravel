@extends('layouts.admin')
@section('content')
    <div class="container">
        <a class="btn btn-primary mb-3" href="{{ route('admin.category.create') }}">Create Category</a>

        <table class="table"  style="border: 2px solid #1b1e21">
            <thead>
            <tr class="text-center" style="border: 4px solid #1b1e21">
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr  style="border: 2px solid darkgrey">
                    <th class="text-center" scope="row">{{ $category->id }}</th>
                    <td class="text-center"><a href="{{ route('admin.category.show', $category->id) }}">{{ $category->title }}</a></td>
                    <td>{{ is_null($category->description) ? 'Nan' : $category->description}}</td>
                    <td class="text-center">{{ $category->status == 1 ? 'Visible' : 'UnVisible'}}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.category.edit', $category->id) }}"
                           class="btn btn-sm btn-outline-primary">Edit</a>
                        <form method="POST" action="{{ route('admin.category.delete', $category->id) }}"
                              class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Are you sure?')">Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
            {{ $categories->links() }}

        </table>

    </div>
@endsection
