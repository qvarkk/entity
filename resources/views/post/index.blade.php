@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Recent Posts</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach ($recentPosts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                            @include('post.includes.post', $post)
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="mx-auto mb-5" style="margin-top: -60px;">
                        {{ $recentPosts->links() }}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        <h4 class="widget-title mb-4">You May Be Interested In</h4>
                        <div class="row blog-post-row">
                            @foreach($randomPosts as $post)
                                <div class="col-md-6 blog-post" data-aos="fade-up">
                                    @include('post.includes.post', $post)
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Popular Posts</h5>
                        <ul class="post-list">
                            @foreach($mostLikedPosts as $post)
                                <li class="post">
                                    <a href="{{ route('post.show', $post->id) }}" class="post-permalink media">
                                        <img src="{{ 'storage/' . $post->preview_image }}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">{{ $post->title }}</h6>
                                        </div>
                                        @include('post.includes.likeForm')
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
