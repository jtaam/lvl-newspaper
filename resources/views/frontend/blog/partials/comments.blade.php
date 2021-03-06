<div class="post-block-wrapper" id="comments">
    <!-- Post Block Head Start -->
    <div class="head">
        <!-- Title -->
        <h4 class="title">All Comments</h4>
    </div><!-- Post Block Head End -->
    <div class="body">

        @if (isset($post->comments))
            @foreach ($post->comments as $comment)
                <div class="comment">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="/profile/{{str_slug($comment->user->name)}}">
                                <img src="{{$comment->user->profile->image}}" alt="{{$comment->user->name}}">
                            </a>

                        </div>
                        <div class="col-md-10">
                            <h4><a href="/profile/{{str_slug($comment->user->name)}}">{{$comment->user->name}}</a> <small>{{$comment->created_at->diffForHumans()}}</small></h4>
                            <p>{{$comment->comment}}</p>
                        </div>
                    </div>
                    <hr/>
                </div>
                <!-- /.comment -->
            @endforeach
        @else
            <div class="comment">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Be the first commenter.</h5>
                    </div>
                </div>
            </div>
        @endif

    </div>
    <!-- /.body -->

    <!-- Post Block Head Start -->
    <div class="head">

        <!-- Title -->
        <h4 class="title">Leave a Comment</h4>

    </div><!-- Post Block Head End -->

    <!-- Post Block Body Start -->
    <div class="body">

        <div class="post-comment-form">
            @guest()
                <p>Please, <a href="{{route('login')}}" class="text-info">Login</a> to comment.</p>
            @else
                <form action="{{route('comment.store', $post->id)}}" class="row" method="post">
                    @csrf
                    <div class="col-12 mb-20">
                        <h5>Logged in as <strong>{{Auth::user()->name}}</strong></h5>
                    </div>
                    <div class="col-12 mb-20">
                        <label for="message">Message <sup>*</sup></label>
                        <textarea id="message" name="comment"></textarea>
                    </div>

                    <div class="col-12">
                        <input type="submit" value="Submit Comment">
                    </div>
                </form>
             @endguest
        </div>

    </div>
</div>
<!-- Post Block Body End -->