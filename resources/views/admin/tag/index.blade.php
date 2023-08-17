@extends('layouts.admin')
@section('content')
    <div class="container">
        <a class="btn btn-primary mb-3" href="{{ route('admin.tag.create') }}">Create Tag</a>

        <table class="table" style="border: 2px solid #1b1e21">
            <thead>
            <tr class="text-center" style="border: 4px solid #1b1e21">
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr  style="border: 2px solid darkgrey">
                    <th scope="row" class="text-center">{{ $tag->id }}</th>
                    <td class="text-center"><a href="category/{{$tag->id}}">{{ $tag->title }}</a></td>
                    <td class="text-center">
                        <a href="{{ route('admin.tag.edit', $tag->id) }}"
                           class="btn btn-sm btn-outline-primary">Edit</a>
                        <form method="POST" action="{{ route('admin.tag.delete', $tag->id) }}"
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
            {{ $tags->links() }}

        </table>

    </div>
@endsection
