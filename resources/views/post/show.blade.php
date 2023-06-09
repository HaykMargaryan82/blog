@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{$date->format('F')}}
                . {{$date->day}} . {{$date->year}} . {{$date->format('H:i')}} . Fetured .{{$post->comments->count()}}
                Comments</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/'.$post->main_image)}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!!$post->content!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <section>
                            @auth()
                            <form action="{{route('post.like.store',$post->id)}}" method="post">
                                @csrf
                                <span>{{$post->liked_users_count}}</span>
                                <button type="submit" class="border-0 bg-transparent  ">

                                        @if(auth()->user()->likedPosts->contains($post->id))
                                            <i class="nav-icon text-danger fas fa-heart"></i>
                                        @else
                                            <i class="nav-icon  far fa-heart"></i>
                                        @endif



                                </button>
                            </form>
                            @endauth
                            @guest()
                                <div>
                                    <span>{{$post->liked_users_count}}</span>
                                    <i class="nav-icon  far fa-heart"></i>
                                </div>
                            @endguest
                        </section>
                        @if($relatedPosts->count() > 0)
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                            <div class="row">
                                @foreach($relatedPosts as $relatedPost)
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        <img src="{{asset('storage/'.$relatedPost->main_image)}}" alt="related post"
                                             class="post-thumbnail">
                                        <p class="post-category">{{$relatedPost->category->title}}</p>
                                        <a class="post-title">{{$relatedPost->id}}</a>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                        @endif

                        <section class="comment_list mb-4">
                            @auth()
                            <h3 class="mb-3"> Comments ( {{$post->comments->count()}} )</h3>
                            @foreach($post->comments as $comment)
                            <div class="comment-text mb-5">
                             <span class="username">
                                <h4>
                                    <i>

                                        {{$comment->user->name}}
                                    </i>
                                </h4>
                                <span class="text-muted float-right">{{$comment->dateAsCarbon->diffForHumans()}}</span>
                             </span><!-- /.username -->
                                {{$comment->message}}
                            </div>
                            @endforeach
                            @endauth
                        </section>
                        <section class="comment-section">
                            <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                            <form action="{{route('post.comment.store',$post->id)}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="comment" class="sr-only">Comment</label>
                                        <textarea name="message" id="comment" class="form-control" placeholder="Comment"
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
                    </div>
                </div>
        </div>
    </main>
@endsection
