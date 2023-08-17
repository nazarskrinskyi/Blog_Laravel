@extends('layouts.personal')
@section('content')

    <div class="p-2">
        <a class="btn btn-primary mb-3" href="{{ route('admin.post.create') }}">Create Post</a>

        <table class="table" style="border: 2px solid #1b1e21">
            <thead>
            <tr class="text-center" style="border: 4px solid #1b1e21">
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Likes</th>
                <th scope="col">Published</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr style="border: 2px solid darkgrey">
                    <th class="text-center" scope="row">{{ $post->id }}</th>
                    <td class="text-center"><a href="{{ route('admin.post.show', $post->id) }}">{{ $post->title }}</a>
                    </td>
                    <td>
                        <div class="textContainer">
                            <p class="displayText">
                                    <?= $post->content ?>
                            </p>
                            <button class="toggleButton btn-primary btn-sm">Show-more</button>
                        </div>
                    </td>
                    <td class="text-center">{{ $post->likes }}</td>
                    <td class="text-center">{{ $post->is_published == 1 ? 'Yes' : 'No'}}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.post.edit', $post->id) }}"
                           class="btn btn-sm btn-outline-primary">Edit</a>
                        <form method="POST" action="{{ route('personal.liked.delete', $post->id) }}"
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
        </table>

    </div>

    <!-- Display the pagination links -->
    @if(!isset($_GET['page']) && $posts->lastPage() > 1)
        <div class="text-center mt-2">
            <a href="{{ isset($_GET['tags']) ? "?tags=$_GET[tags]&page=1" : '?page=1' }}" class="btn btn-primary">Show Pages</a>
        </div>
    @endif
    @if($posts->lastPage() > 1 && isset($_GET['page']))
        <div class="pagination justify-content-center">
            <nav aria-label="Page navigation ">
                <ul class="pagination">
                    @if($_GET['page'] > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ isset($_GET['tags']) ? "?tags=$_GET[tags]&page=".$_GET['page']-1 : '?page='.$_GET['page']-1 }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                    @endif

                    @for($i = 1;$i <= $posts->lastPage();$i++)
                        <li class="page-item"><a class="page-link" href="{{ isset($_GET['tags']) ? "?tags=$_GET[tags]&page=".$i : '?page='.$i }}">{{ $i }}</a></li>
                    @endfor

                    @if($posts->lastPage() > $_GET['page'])
                        <li class="page-item">
                            <a class="page-link" href="{{ isset($_GET['tags']) ? "?tags=$_GET[tags]&page=".$_GET['page']+1 : '?page='.$_GET['page']+1 }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    @endif

@endsection
