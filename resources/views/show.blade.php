@extends('layouts.main')

@section('content')
    <style>
        .pagination .active {
            background: deepskyblue;
            color: white;
        }
    </style>
    <main class="blog-post">
        @if(session()->has('error'))
            <h2 class="text-center text-danger">{{ session('error') }}</h2>
        @endif
        <div class="container">
            <h1 class="edica-page-title aos-init aos-animate" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">Written
                by {{ $author->name }} • {{ $date->format('Y F d').'st ' . $date->format('H:i:s') }} • Featured
                • {{ $post->comments->count() . " Comments" }}</p>
            <section class="blog-post-featured-img aos-init" data-aos="fade-up" data-aos-delay="300">
                <div>
                    <img src="{{ asset("storage/" . $post->image) }}" alt="featured image" class="w-100">
                </div>
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto aos-init" data-aos="fade-up">
                        <p>{!! $post->content !!}</p>
                        <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out printed
                            graphic or web designs. The passage is at attributed to an unknown typesetters in 1the 5th
                            century who is thought scrambled with all parts of Cicero’s De. Lorem ipsum, or lipsum as it
                            is sometimes known, is dummy text used in laying out printed graphic or web designs</p>
                        <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out printed
                            graphic or web designs. The passage is at attributed to an unknown typesetters in 1the 5th
                            century who is thought scrambled with all parts of Cicero’s De. Lorem ipsum, or lipsum as it
                            is sometimes known, is dummy text used in laying out printed graphic or web designs</p>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-4 mb-3 aos-init" data-aos="fade-right">
                        <img src="{{ asset('assets/images/blog_post_1.jpg') }}" alt="blog post" class="img-fluid">
                    </div>
                    <div class="col-md-4 mb-3 aos-init" data-aos="fade-up">
                        <img src="{{ asset("assets/images/blog_post_2.jpg") }}" alt="blog post" class="img-fluid">
                    </div>
                    <div class="col-md-4 mb-3 aos-init" data-aos="fade-left">
                        <img src="{{ asset("assets/images/blog_post_3.jpg") }}" alt="blog post" class="img-fluid">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <p data-aos="fade-up" class="aos-init"><a href="#">Lorem ipsum, or lipsum as it is sometimes
                                known,</a> is dummy text used in laying out printed graphic or web designs. The passage
                            is at attributed to an unknown typesetters in 1the 5th century who is thought scrambled with
                            all parts of Cicero’s De. Lorem ipsum, or lipsum as it is sometimes known, is dummy text
                            used in laying out printed graphic or web designs</p>
                        <h2 class="mb-4 aos-init" data-aos="fade-up">Blog single page</h2>
                        <ul data-aos="fade-up" class="aos-init">
                            <li>What manner of thing was upon me I did not know, but that it was large and heavy and
                                many-legged I could feel.
                            </li>
                            <li>My hands were at its throat before the fangs had a chance to bury themselves in my neck,
                                and slowly
                            </li>
                            <li>I forced the hairy face from me and closed my fingers, vise-like, upon its windpipe.
                            </li>
                        </ul>

                        <blockquote data-aos="fade-up" class="aos-init">
                            <p>You are safe here! I shouted above the sudden noise. She looked away from me downhill.
                                The people were coming out of their houses, astonished.</p>
                            <footer class="blockquote-footer">Oluchi Mazi</footer>
                        </blockquote>
                        <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out printed
                            graphic or web designs. The passage is at attributed to an unknown typesetters in 1the 5th
                            century who is thought scrambled with all parts of Cicero’s De. Lorem ipsum, or lipsum as it
                            is sometimes known, is dummy text used in laying out printed graphic or web designs</p>
                    </div>
                </div>
            </section>


            @if(!empty($relatedPosts[0]))
                <section class="related-posts">
                    <h2 class="text-center section-title mb-4 aos-init" data-aos="fade-up">Related Posts</h2>
                    <div class="row">
                        @foreach($relatedPosts as $relatedPost)
                            <div class="col-md-4 aos-init image" data-aos="fade-right" data-aos-delay="100">
                                <img src="{{ asset("storage/" . $relatedPost->image) }}" alt="related post"
                                     class="post-thumbnail">
                                <div class="d-flex justify-content-between">
                                    @if ($relatedPost->category)
                                        <p class="blog-post-category">{{ $relatedPost->category->title }}</p>
                                    @endif
                                    <form action="{{ route('post.like.store', $relatedPost->id) }}" method="post">
                                        @csrf
                                        <button type="submit"
                                                class=" btn btn-sm btn-outline-primary  u-link-v5 g-color-gray-dark-v4 g-color-primary--hover"
                                        >
                                            @if(auth()->user() !== null)
                                                @if(auth()->user()->likedPosts->contains($relatedPost->id))
                                                    <i class="fa fa-heart g-pos-rel g-top-1 g-mr-3"></i>
                                                @else
                                                    <i class="far fa-heart g-pos-rel g-top-1 g-mr-3"></i>
                                                @endif
                                            @else
                                                <i class="fa fa-heart g-pos-rel g-top-1 g-mr-3"></i>
                                            @endif
                                            <span>{{ $relatedPost->liked_users_count }}</span>
                                        </button>
                                    </form>
                                </div>
                                <a href="{{ route('post.show', $relatedPost->id) }}"
                                   style="text-decoration: none">
                                    <h5
                                        class="post-title">{{ $relatedPost->title }}</h5></a>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

            <h2 class="text-center mt-1 mb-4">Comments({{ count($comments) }})</h2>

            @foreach($comments as $comment)
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="media g-mb-30 media-comment">
                            <a href="{{ route('profile.show', $comment->profile->id) }}">
                                @if($comment->profile->image)
                                <img class=" d-flex g-width-5 g-height-5 rounded-circle g-mt-1 g-mr-5 p-2" width="100"
                                     height="100"
                                     src="{{ asset("storage/" . $comment->profile->image) }}" alt="Image Description">
                                @else
                                    <img class="d-flex g-width-5 g-height-5 rounded-circle g-mt-1 g-mr-5 p-1" width="100"
                                         height="100"
                                         src="{{ asset("storage/images/user-avatar-filled.svg") }}" alt="Image Description">
                                @endif
                            </a>
                            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                                <div class="g-mb-15">
                                    <a href="{{ route('profile.show', $comment->profile->id) }}" style="color: #1b1e21">
                                        <h5 class="h5 g-color-gray-dark-v1 mb-0">{{ $comment->user->name }}</h5>
                                    </a>
                                    <span
                                        class="text-primary g-color-gray-dark-v4 g-font-size-12">{{ $comment->getDateAsCarbonAttr()->format('Y-m-d H:i:s') }}</span>
                                </div>
                                <p>{{ $comment->content }}</p>
                                <ul class="list-inline d-sm-flex my-0">
                                    <li class="list-inline-item g-mr-20" style="margin-top: -10px">
                                        <form action="{{ route('post.like.comment.store', $comment->id) }}"
                                              method="post">
                                            @csrf
                                            <button type="submit"
                                                    class=" btn btn-outline-primary u-link-v5 g-color-gray-dark-v4 g-color-primary--hover"
                                            >
                                                @if(auth()->user() !== null)
                                                    @if(auth()->user()->likedComments->contains($comment->id))
                                                        <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                                                    @else
                                                        <i class="far fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                                                    @endif
                                                @else
                                                    <i class="far fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                                                @endif
                                                <span>{{ $comment->liked_comments_count }}</span>
                                            </button>
                                        </form>
                                    </li>


                                    @if(!empty($comment->replies[0]))
                                        <li class="list-inline-item ml-auto">
                                            <button class="show-reply-toggle btn btn-outline-primary btn-sm"
                                                    data-comment="{{ $comment->id }}"
                                            >
                                                <i class="fa fa-arrow-down g-pos-rel g-top-1 g-mr-3"></i>
                                                <span class="button-text">Show Replies</span>
                                            </button>
                                        </li>
                                    @endif


                                    <li class="list-inline-item ml-auto">
                                        <button class="reply-toggle btn btn-outline-primary btn-sm"
                                                data-comment="{{ $comment->id }}"
                                        >
                                            <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                                            Reply
                                        </button>
                                    </li>
                                </ul>


                                <div class="reply-form" style="visibility: hidden" data-comment="{{ $comment->id }}">
                                    <form action="{{ route('post.reply.comment.store', $comment->id) }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-8 aos-init" data-aos="fade-up">
                                                <label for="comment" class="sr-only">Comment</label>
                                                <textarea name="content" id="comment" class="form-control"
                                                          placeholder="Comment"
                                                          rows="4"></textarea>
                                                @error('content')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 aos-init" data-aos="fade-up">
                                                <input type="submit" value="Send Message" class="btn btn-warning">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                @foreach($comment->replies as $reply)
                    <div class="row mb-3 show-reply-form" data-comment="{{ $comment->id }}">
                        <div class="col-md-9">
                            <div class="media g-mb-30 media-comment">
                                <a href="{{ route('profile.show', $reply->profile->id) }}" style="color: #1b1e21">
                                    @if($reply->profile->image)
                                        <img class=" d-flex g-width-5 g-height-5 rounded-circle g-mt-1 g-mr-5 p-3" width="100"
                                             height="100"
                                             src="{{ asset("storage/" . $reply->profile->image) }}" alt="Image Description">
                                    @else
                                        <img class="d-flex g-width-5 g-height-5 rounded-circle g-mt-1 g-mr-5 p-1" width="100"
                                             height="100"
                                             src="{{ asset("storage/images/user-avatar-filled.svg") }}" alt="Image Description">
                                    @endif
                                </a>
                                <div class="media-body u-shadow-v16 g-bg-secondary g-pa-20">
                                    <div class="g-mb-15">
                                        <a href="{{ route('profile.show', $reply->profile->id) }}" style="color: #1b1e21">
                                            <h6 class="h6 g-color-gray-dark-v1 mb-0">{{ $reply->user->name }}</h6>
                                        </a>
                                        <span
                                            class="text-primary g-color-gray-dark-v3 g-font-size-11"
                                            style="font-size: 14px;">{{ $reply->created_at }}</span>
                                    </div>
                                    <p>{{ $reply->content }}</p>
                                    <ul class="list-inline d-sm-flex my-0">
                                        <li class="list-inline-item g-mr-10"
                                            style="margin-top: -15px">
                                            <form
                                                action="{{ route('post.like.comment.reply.store', $reply->id) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit" style="font-size: 14px;padding: 3px 7px 3px 7px"
                                                        class=" btn btn-outline-primary u-link-v5 g-color-gray-dark-v4 g-color-primary--hover"
                                                >
                                                    @if(auth()->user() !== null)
                                                        @if(auth()->user()->likedReplies->contains($reply->id))
                                                            <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                                                        @else
                                                            <i class="far fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                                                        @endif
                                                    @else
                                                        <i class="far fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                                                    @endif
                                                    <span>{{ $reply->liked_replies_count }}</span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                @endforeach
                <hr>
            @endforeach

            <!-- Display the pagination links -->
            @if(!isset($_GET['page']) && $comments->lastPage() > 1)
                <div class="text-center mt-4" style="margin-top: -100px">
                    <a href="?page=2" class="btn btn-primary">Show More</a>
                </div>
            @endif
            @if($comments->lastPage() > 1 && isset($_GET['page']))
                <div class="pagination justify-content-center mt-4" style="margin-top: -100px">
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

                            @for($i = 1;$i <= $comments->lastPage();$i++)
                                <li class="page-item">
                                    <a class="page-link {{ $_GET['page'] == $i ? 'active' : '' }}"
                                       href="{{ '?page='.$i }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if($comments->lastPage() > $_GET['page'])
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


            <div class="row mt-5">
                <div class="col-lg-9 mx-auto">
                    <section class="comment-section">
                        <h2 class="section-title mb-5 aos-init" data-aos="fade-up">Leave a Reply</h2>
                        <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12 aos-init" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Comment</label>
                                    <textarea name="content" id="comment" class="form-control" placeholder="Comment"
                                              rows="10"></textarea>
                                    @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 aos-init" data-aos="fade-up">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </main>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            // Listen for click on the reply buttons
            $('.reply-toggle').on('click', function () {
                var commentId = $(this).data('comment');
                var replyForm = $('.reply-form[data-comment="' + commentId + '"]');

                // Toggle the visibility of the reply form using CSS visibility property
                replyForm.css('visibility', function (index, visibility) {
                    // Toggle the max-height to transition the form smoothly
                    if (replyForm.css('max-height') === '0px') {
                        replyForm.css('max-height', '500px'); // Adjust the value as needed
                    } else {
                        replyForm.css('max-height', '0');
                    }
                    return (visibility === 'visible') ? 'hidden' : 'visible';
                });

                // Scroll to the reply form if it's being shown
                if (replyForm.css('visibility') === 'visible') {

                    $('html, body').animate({
                        scrollTop: replyForm.offset().top - $(window).height() / 2
                    }, 500); // Adjust the animation duration as needed
                }
            });
        });

        $('.show-reply-toggle').on('click', function () {
            var commentId = $(this).data('comment');
            console.log(commentId)
            var replyForm = $('.show-reply-form[data-comment="' + commentId + '"]');
            console.log(replyForm)
            var buttonText = $(this).find('.button-text');
            console.log(buttonText)

            replyForm.toggleClass('open'); // Add or remove 'open' class to toggle visibility

            if (replyForm.hasClass('open')) {
                buttonText.text('Hide Replies');
                $('html, body').animate({
                    scrollTop: replyForm.offset().top - $(window).height() / 2
                }, 500);
            } else {
                buttonText.text('Show Replies');
            }
        });

    </script>

@endsection
