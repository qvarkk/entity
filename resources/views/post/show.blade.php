@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <div class="edica-blog-post-meta row d-flex justify-content-center align-items-center">
                <p class="m-0 mr-3" data-aos="fade-up" data-aos-delay="200">{{ $date }}
                    • {{ $post->category->title }} • {{ $post->comments()->count() }} Comments • {{ $post->likes }}
                    Likes</p>
                <form action="{{ route('post.like.store', $post->id) }}" method="post">
                    @csrf
                    <button type="submit" class="border-0 bg-transparent shadow-none" style="outline: none;">
                        @auth()
                            @if(auth()->user()->likedPosts->contains($post->id))
                                <i data-aos="fade-up" class="fas fa-heart" style="color: #e34a40; font-size: 1.25rem;"></i>
                            @else
                                <i data-aos="fade-up" class="far fa-heart" style="color: #e34a40; font-size: 1.25rem;"></i>
                            @endif
                        @endauth
                    </button>
                </form>
            </div>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/' . $post->preview_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if($relatedPosts->count() > 0)
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                            <div class="row">
                                @foreach($relatedPosts as $relPost)
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        <img src="{{ asset('storage/' . $relPost->preview_image) }}" alt="related post"
                                             class="post-thumbnail">
                                        <p class="post-category">{{ $relPost->category->title }}</p>
                                        <a href="{{ route('post.show', $relPost->id) }}" class="blog-post-permalink">
                                            <h5 class="post-title">{{ $relPost->title }}</h5>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif
                    @if($comments->count() > 0)
                        <section class="comment-list">
                            <h2 class="section-title mb-4" data-aos="fade-up">Comments</h2>
                            @foreach($comments as $comment)
                                <div class="card-comment p-3 my-4" data-aos="fade-up"
                                     style="border: 2px solid #fff0e8; border-radius: 25px;">
                                    <div class="comment-text">
                                        <div class="username">
                                        <span
                                            style="font-weight: bold; font-size: 1.25rem">{{ $comment->user->name }}</span>
                                            <span
                                                class="text-muted float-right">{{ $comment->formatedDate->diffForHumans() }}</span>
                                        </div>
                                        <div class="p-3">
                                            {{ $comment->message }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </section>
                    @endif

                    @auth()
                        <section class="comment-section">
                            <h2 class="section-title mb-5" data-aos="fade-up">Leave a Comment</h2>
                            <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="comment" class="sr-only">Comment</label>
                                        <textarea name="message" id="message" class="form-control"
                                                  style="border-radius: 25px" placeholder="Message"
                                                  rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <input type="submit" value="Send Message" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
