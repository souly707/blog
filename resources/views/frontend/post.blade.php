@extends('layouts.app')

@section('content')

<div class="page-blog-details section-padding--lg bg--white">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="blog-details content">
                    <article class="blog-post-details">

                        @if ($post->media->count() > 0)

                        <div id="carouselIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @foreach ($post->media as $media)

                                <button type="button" data-bs-target="#carouselIndicators"
                                    data-bs-slide-to="{{ $loop->index }}"
                                    class="{{ $loop->index == 0 ? 'active' : '' }}" aria-current="true"
                                    aria-label="{{ $loop->index }}">
                                </button>

                                @endforeach
                            </div>

                            <div class="carousel-inner">

                                @foreach ($post->media as $media)

                                <div class="carousel-item active">
                                    <img src="{{ asset('assets/posts/' . $media->file_name) }}" class="d-block w-100"
                                        alt="{{ $post->title }}">
                                </div>
                                @endforeach
                            </div>

                            @if ($post->media->count() > 1)

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>

                            @endif

                        </div>

                        @endif

                        <div class="post_wrapper">
                            <div class="post_header">
                                <h2>{{ $post->title }}</h2>
                                <div class="blog-date-categori">
                                    <ul>
                                        <li>{{ $post->created_at->format('M d Y') }}June 27, 2018</li>
                                        <li><a href="#" title="Posts by {{ $post->user->name }}"
                                                rel="author">{{ $post->user->name }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="post_content">

                                <p>{{ $post->description }}</p>

                            </div>
                            <ul class="blog_meta">
                                <li><a href="#">{{ $post->approved_comments->count() }} comment(s)</a></li>
                                <li> / </li>
                                <li>Category:<span>{{ $post->category->name }}</span> </li>
                            </ul>
                        </div>
                    </article>

                    {{-- Start Comments --}}
                    <div class="comments_area">
                        {{-- <h3 class="comment__title">{{ $post->approved_comments->count() }} comment(s)</h3> --}}
                        <ul class="comment__list">
                            @forelse ($post->approved_comments as $comment)
                            <li>
                                <div class="wn__comment">
                                    <div class="thumb">
                                        <img src="{{ asset('frontend/images/blog/comment/1.jpeg') }}"
                                            alt="comment images">
                                    </div>
                                    <div class="content">
                                        <div class="comnt__author d-block d-sm-flex">
                                            <span>
                                                <a href="{{ $comment->url != '' ? $comment->url : '#' }}">{{ $comment->name }}
                                                </a>
                                            </span>
                                            <span>{{ $comment->created_at->format('M d Y h:i a') }}</span>
                                        </div>
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            </li>
                            @empty

                            <li>
                                <p>No Comments Found</p>
                            </li>
                            @endforelse

                        </ul>
                    </div>
                    <div class="comment_respond">
                        <h3 class="reply_title">Leave a Reply</h3>

                        <form action="{{ route('posts.add_comment', $post->slug) }}" method="POST"
                            class="comment__form">
                            @csrf

                            <p>Your email address will not be published.Required fields are marked </p>
                            <div class="input__box">
                                <textarea name="comment" placeholder="Your comment here">{{ old('comment') }}</textarea>
                            </div>
                            <div class="input__wrapper clearfix">

                                <div class="input__box name one--third">
                                    <input type="text" name="name" placeholder="name" value="{{ old('name') }}">
                                </div>

                                <div class="input__box email one--third">
                                    <input type="email" name="email" placeholder="email" value="{{ old('email') }}">
                                </div>

                                <div class="input__box website one--third">
                                    <input type="text" name="url" placeholder="website" value="{{ old('url') }}">
                                </div>

                            </div>

                            <button type="submit" class="btn btn-outline-dark rounded mt-4">
                                Post Comment
                            </button>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                <div class="wn__sidebar">
                    <!-- Start Single Widget -->
                    <aside class="widget search_widget">
                        <h3 class="widget-title">Search</h3>
                        <form action="#">
                            <div class="form-input">
                                <input type="text" placeholder="Search...">
                                <button><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </aside>
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->
                    <aside class="widget recent_widget">
                        <h3 class="widget-title">Recent</h3>
                        <div class="recent-posts">
                            <ul>
                                <li>
                                    <div class="post-wrapper d-flex">
                                        <div class="thumb">
                                            <a href="blog-details.html"><img
                                                    src="{{ asset('frontend/images/blog/sm-img/1.jpg') }}"
                                                    alt="blog images"></a>
                                        </div>
                                        <div class="content">
                                            <h4><a href="blog-details.html">Blog image post</a></h4>
                                            <p> March 10, 2015</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-wrapper d-flex">
                                        <div class="thumb">
                                            <a href="blog-details.html"><img
                                                    src="{{ asset('frontend/images/blog/sm-img/2.jpg') }}"
                                                    alt="blog images"></a>
                                        </div>
                                        <div class="content">
                                            <h4><a href="blog-details.html">Post with Gallery</a></h4>
                                            <p> March 10, 2015</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-wrapper d-flex">
                                        <div class="thumb">
                                            <a href="blog-details.html"><img
                                                    src="{{ asset('frontend/images/blog/sm-img/3.jpg') }}"
                                                    alt="blog images"></a>
                                        </div>
                                        <div class="content">
                                            <h4><a href="blog-details.html">Post with Video</a></h4>
                                            <p> March 10, 2015</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-wrapper d-flex">
                                        <div class="thumb">
                                            <a href="blog-details.html"><img
                                                    src="{{ asset('frontend/images/blog/sm-img/4.jpg') }}"
                                                    alt="blog images"></a>
                                        </div>
                                        <div class="content">
                                            <h4><a href="blog-details.html">Maecenas ultricies</a></h4>
                                            <p> March 10, 2015</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-wrapper d-flex">
                                        <div class="thumb">
                                            <a href="blog-details.html"><img
                                                    src="{{ asset('frontend/images/blog/sm-img/5.jpg') }}"
                                                    alt="blog images"></a>
                                        </div>
                                        <div class="content">
                                            <h4><a href="blog-details.html">Blog image post</a></h4>
                                            <p> March 10, 2015</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </aside>
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->
                    <aside class="widget comment_widget">
                        <h3 class="widget-title">Comments</h3>
                        <ul>
                            <li>
                                <div class="post-wrapper">
                                    <div class="thumb">
                                        <img src="{{ asset('frontend/images/blog/comment/1.jpeg') }}"
                                            alt="Comment images">
                                    </div>
                                    <div class="content">
                                        <p>demo says:</p>
                                        <a href="#">Quisque semper nunc vitae...</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="post-wrapper">
                                    <div class="thumb">
                                        <img src="{{ asset('frontend/images/blog/comment/1.jpeg') }}"
                                            alt="Comment images">
                                    </div>
                                    <div class="content">
                                        <p>Admin says:</p>
                                        <a href="#">Curabitur aliquet pulvinar...</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="post-wrapper">
                                    <div class="thumb">
                                        <img src="{{ asset('frontend/images/blog/comment/1.jpeg') }}"
                                            alt="Comment images">
                                    </div>
                                    <div class="content">
                                        <p>Irin says:</p>
                                        <a href="#">Quisque semper nunc vitae...</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="post-wrapper">
                                    <div class="thumb">
                                        <img src="{{ asset('frontend/images/blog/comment/1.jpeg') }}"
                                            alt="Comment images">
                                    </div>
                                    <div class="content">
                                        <p>Boighor says:</p>
                                        <a href="#">Quisque semper nunc vitae...</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="post-wrapper">
                                    <div class="thumb">
                                        <img src="{{ asset('frontend/images/blog/comment/1.jpeg') }}"
                                            alt="Comment images">
                                    </div>
                                    <div class="content">
                                        <p>demo says:</p>
                                        <a href="#">Quisque semper nunc vitae...</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </aside>
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->
                    <aside class="widget category_widget">
                        <h3 class="widget-title">Categories</h3>
                        <ul>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Creative</a></li>
                            <li><a href="#">Electronics</a></li>
                            <li><a href="#">Kids</a></li>
                            <li><a href="#">Flower</a></li>
                            <li><a href="#">Books</a></li>
                            <li><a href="#">Jewelle</a></li>
                        </ul>
                    </aside>
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->
                    <aside class="widget archives_widget">
                        <h3 class="widget-title">Archives</h3>
                        <ul>
                            <li><a href="#">March 2015</a></li>
                            <li><a href="#">December 2014</a></li>
                            <li><a href="#">November 2014</a></li>
                            <li><a href="#">September 2014</a></li>
                            <li><a href="#">August 2014</a></li>
                        </ul>
                    </aside>
                    <!-- End Single Widget -->
                </div>
            </div>

        </div>
    </div>
</div>

@endsection