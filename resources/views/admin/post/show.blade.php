@extends('layouts.admin')

@section('content')
    <style>
        /* Define the style for the tags */
        .tag {
            display: inline-block;
            padding: 4px 10px;
            background-color: #f2f2f2;
            color: #333;
            border-radius: 4px;
            margin-right: 5px;
            margin-bottom: 5px;
            transition: 0.5s;

        }

        .tag:hover {
            color: deepskyblue;
            transition: 0.5s;
        }

        /* Optional: If you want to align the tags in the center */
        .tags-cell {
            display: flex;
            align-items: center;
            justify-content: center;
        }

    </style>
    <div>
        <h1 class="text-center">{{ $post->title }}</h1>
        <a class="btn btn-warning mb-3" href="{{ route('admin.post.edit', $post->id) }}">Edit</a>
        <form method="POST" action="{{ route('admin.post.delete', $post->id) }}"
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
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Tags</th>
                <th scope="col">Likes</th>
                <th scope="col">Published</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th class="text-center" scope="row">{{ $post->id }}</th>
                <td class="text-center">{{ $post->title }}</td>
                <td>
                    <div class="textContainer">
                        <p class="displayText">
                            <?= $post->content ?>
                        </p>
                    </div>
                </td>
                <td class="text-center tags-cell">
                    @php
                        $tagsCollection = collect($tags);
                    @endphp
                    @foreach($tagsCollection->chunk(4) as $tagChunk)
                        <div>
                            @foreach($tagChunk as $tag)
                                <a href="{{ route("admin.post.index","tags=$tag->id") }}"><span class="tag">{{ $tag->title }}</span></a>
                            @endforeach
                        </div>
                    @endforeach
                </td>

                <td class="text-center">{{ $post->likes }}</td>
                <td class="text-center">{{ $post->is_published == 1 ? 'Yes' : 'No'}}</td>
            </tr>
            </tbody>
        </table>
        <div class="mt-2 text-center">
            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="No image...">
            @if(!$post->image)
                <a href="{{ route('admin.post.edit',$post->id) }}">set here</a>
            @endif
        </div>
    </div>
@endsection
