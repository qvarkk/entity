<div class="blog-post-thumbnail-wrapper">
    <img src="{{ 'storage/' . $post->preview_image }}" alt="blog post">
</div>
<div class="row">
    <div class="col-10 d-flex flex-column w-100">
        <p class="blog-post-category"
           style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $post->category->title }}</p>
        <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
            <h6 class="blog-post-title"
                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $post->title }}</h6>
        </a>
    </div>
    <div class="col-2 d-flex justify-content-center align-items-center">
        @include('post.includes.likeForm')
    </div>
</div>
