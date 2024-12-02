<main class="main">
    @if($check == false)
        <div class="page-title dark-background">
            <div class="container position-relative">
                <h1>Blog</h1>
                <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda
                    numquam
                    molestias.</p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a class="show"  href="/post">Home</a></li>
                        <li class="current">Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
        <section id="blog-posts" class="blog-posts section">

            <div class="container">
                <div class="row gy-4">

                    @foreach ($blogs as $item)
                        <div class="col-lg-4">
                            <article>

                                <div class="post-img">
                                    <img src="{{asset('assets/img/blog/blog-1.jpg')}}" alt="" class="img-fluid">
                                </div>

                                <p class="post-category">{{$item->category->name}}</p>

                                <h2 class="title">
                                    <a class="show"  wire:click="show({{$item->id}})">{{$item->title}}</a>
                                </h2>
                            </article>
                        </div>
                    @endforeach
                    {{$blogs->links()}}
                </div>
            </div>
        </section>
    @endif
    @if($check)
        <div class="page-title dark-background">
            <div class="container position-relative">
                <h1>Blog Details</h1>
                <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda
                    numquam molestias.</p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a class="show"  href="/post">Home</a></li>
                        <li class="current">Blog Details</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-lg-8">

                    <section id="blog-details" class="blog-details section">
                        <div class="container">

                            <article class="article">
                                <div class="post-img">
                                    <img src="{{asset('assets/img/blog/blog-1.jpg')}}" alt="" class="img-fluid">
                                </div>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a class="show"
                                                href="blog-details.html">John Doe</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a class="show"
                                                href="blog-details.html">{{$blog->views->count()}}</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a class="show"
                                                href="blog-details.html">
                                                <time datetime="2020-01-01">Jan 1, 2022</time>
                                            </a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a class="show"
                                                href="blog-details.html">{{$comments->count()}}</a></li>

                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-hand-thumbs-up"></i>
                                            @if($react && $react->value === 1)
                                                <span class="like active">Liked</span>
                                            @else
                                                <a class="show"  wire:click="reaction({{ $blog->id }}, 1)" class="like">Like</a>
                                            @endif
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-hand-thumbs-down"></i>
                                            @if($react && $react->value === 0)
                                                <span class="dislike active">Disliked</span>
                                            @else
                                                <a class="show"  wire:click="reaction({{ $blog->id }}, 0)" class="dislike">Dislike</a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>

                                <div class="content">
                                    <h3>{{$blog->title}}</h3>
                                    <p>{{$blog->description}}</p>
                                </div>
                            </article>
                        </div>
                    </section>

                    <section id="blog-comments" class="blog-comments section">

                        <div class="container">

                            <h4 class="comments-count">{{$comments->count()}}</h4>
                            @foreach($comments as $comment)
                                <div id="comment-1" class="comment">
                                    <div class="d-flex">
                                        <div class="comment-img"><img src="assets/img/blog/comments-1.jpg" alt=""></div>
                                        <div>
                                            <h5><a class="show"  wire:click="answer({{ $comment->id }}, {{ $blog->id }})"
                                                   class="reply">
                                                    <i class="bi bi-reply-fill"></i> Reply
                                                </a>
                                            </h5>
                                            <time datetime="2020-01-01">01 Jan,2022</time>
                                            <p>{{$comment->text}}</p>
                                        </div>
                                    </div>
                                    @if($parent_id == $comment->id)
                                        <textarea wire:model="text" class="form-control mt-2 mb-2"
                                                  placeholder="Write your reply comment here..."></textarea>
                                        <input type="submit" wire:click="replyTest"
                                               class="btn btn-primary btn-sm" value="Reply">
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <section id="comment-form" class="comment-form section">
                        <div class="container">
                            <form wire:submit.prevent="comment({{$blog->id}})">
                                <h4>Post Comment</h4>
                                <div class="row">
                                    <div class="col form-group">
                                            <textarea wire:model="text" class="form-control"
                                                      placeholder="Your Comment..."></textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Post Comment</button>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>

                <div class="col-lg-4 sidebar">

                    <div class="widgets-container">

                        <div class="blog-author-widget widget-item">

                            <div class="d-flex flex-column align-items-center">
                                <img src="assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0"
                                     alt="">
                                <h4>Jane Smith</h4>
                                <div class="social-links">
                                    <a class="show"  href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                    <a class="show"  href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                    <a class="show"  href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                    <a class="show"  href="https://instagram.com/#"><i class="biu bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="search-widget widget-item">

                            <h3 class="widget-title">Search</h3>
                            <form action="">
                                <input type="text">
                                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                            </form>

                        </div>
                        <div class="categories-widget widget-item">

                            <h3 class="widget-title">Categories</h3>
                            <ul class="mt-3">
                                @foreach($categories as $category)
                                    <li><a class="show"  href="#">{{$category->name}}</a></li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</main>
