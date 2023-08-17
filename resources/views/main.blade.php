@extends('layouts.main')

@section('content')
    <style>
        .pagination .active {
            background: deepskyblue;
            color: white;
        }
    </style>
    <main class="blog">
        @if(session()->has('error'))
            <h2 class="text-center text-danger">{{ session('error') }}</h2>
        @endif
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ "storage/" . $post->image }}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between">
                                @if ($post->category)
                                    <p class="blog-post-category">{{ $post->category->title }}</p>
                                @endif
                                <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                    @csrf
                                    <button type="submit"
                                            class="btn btn-sm btn-outline-primary u-link-v5 g-color-gray-dark-v4 g-color-primary--hover"
                                    >
                                        @if(auth()->user() !== null)
                                            @if(auth()->user()->likedPosts->contains($post->id))
                                                <i class="fa fa-heart g-pos-rel g-top-1 g-mr-3"></i>
                                            @else
                                                <i class="far fa-heart g-pos-rel g-top-1 g-mr-3"></i>
                                            @endif
                                        @else
                                            <i class="far fa-heart g-pos-rel g-top-1 g-mr-3"></i>
                                        @endif
                                        <span>{{ $post->liked_users_count }}</span>
                                    </button>
                                </form>
                            </div>
                            <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                        </div>
                    @endforeach

                </div>
            </section>


            <!-- Display the pagination links -->
            @if(!isset($_GET['page']) && $posts->lastPage() > 1)
                <div class="text-center mb-4" style="margin-top: -100px">
                    <a href="?page=2" class="btn btn-primary">Show More</a>
                </div>
            @endif
            @if($posts->lastPage() > 1 && isset($_GET['page']))
                <div class="pagination justify-content-center mb-4" style="margin-top: -100px">
                    <nav aria-label="Page navigation ">
                        <ul class="pagination">
                            @if($_GET['page'] > 1)
                                <li class="page-item">
                                    <a class="page-link"
                                       href="{{ '?page='.$_GET['page'] - 1 }}"
                                       aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            @endif

                            @for($i = 1;$i <= $posts->lastPage();$i++)
                                <li class="page-item">
                                    <a class="page-link {{ $_GET['page'] == $i ? 'active' : '' }}" href="{{ '?page='.$i }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if($posts->lastPage() > $_GET['page'])
                                <li class="page-item">
                                    <a class="page-link"
                                       href="{{ '?page='.$_GET['page'] + 1 }}"
                                       aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            @endif

            <div class="col-md-8 mt-3 mb-3">
                <h2 class="text-center">Random Posts</h2>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <section>
                        <div class="row blog-post-row">
                            @foreach($randomPosts as $post)
                                <div class="col-md-6 blog-post" data-aos="fade-up">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="blog post">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        @if ($post->category)
                                            <p class="blog-post-category">{{ $post->category->title }}</p>
                                        @endif
                                        <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                            @csrf
                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-primary u-link-v5 g-color-gray-dark-v4 g-color-primary--hover"
                                            >
                                                @if(auth()->user() !== null)
                                                    @if(auth()->user()->likedPosts->contains($post->id))
                                                        <i class="fa fa-heart g-pos-rel g-top-1 g-mr-3"></i>
                                                    @else
                                                        <i class="far fa-heart g-pos-rel g-top-1 g-mr-3"></i>
                                                    @endif
                                                @else
                                                    <i class="far fa-heart g-pos-rel g-top-1 g-mr-3"></i>
                                                @endif
                                                <span>{{ $post->liked_users_count }}</span>
                                            </button>
                                        </form>
                                    </div>
                                    <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{ $post->title }}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-carousel">
                        <h5 class="widget-title">Popular Posts</h5>
                        <div class="post-carousel">
                            <div id="carouselId" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselId" data-slide-to="1"></li>
                                    <li data-target="#carouselId" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    @foreach($sliderPosts as $key => $post)
                                        <figure class="carousel-item {{ $key===0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="First slide">
                                            <figcaption class="post-title">
                                                <a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
                                            </figcaption>
                                        </figure>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Liked Posts</h5>
                        <ul class="post-list">
                            <li class="post">
                                @foreach($sidePosts as $post)
                                    <a href="{{ route('post.show', $post->id) }}" class="post-permalink media">
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">{{ $post->title }}</h6>
                                        </div>
                                    </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
