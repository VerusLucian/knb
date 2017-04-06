@php ($question = $post)
<div class="content">
        <article class="media ">
            <figure class="media-type media-left media-question">
                <img src="{{asset('img/icons/question.png')}}" alt="">
            </figure>
            <div class="media-content">
                <div class="content  media-post">
                    <p>
                        <strong>{{$post->author->name}}</strong>
                    </p>
                    <h4 class="title is-4">{{$post->title}}</h4>
                    <p>{!! $post->content !!}
                    </p>
                    <div class="button-group">
                        <a href="{{action('PostController@answer', $post->id)}}" class="button is-success">Give answer</a>
                        <a href="" class="btn-add-comment button is-info">Add comment</a>
                        @include('partials.minis._vote-group')
                    </div>
                    <div class="form-comment-hidden">
                        @include('partials/_create-comment')
                    </div>
                    <h3 class="is-3">{{count($post->comments)}} comments</h3>
                    <div class="comment-box">
                        @foreach($post->comments as $comment)
                        <article class="media">
                            <div class="content media-post-comment">
                                <strong>{{$comment->author->name}}</strong>

                                <p>{!! nl2br($comment->content) !!}</p>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>
                <h2 class="is-2">{{count($replies)}} Answers</h2>
                @foreach($replies as $post)
                <article class="media">
                    @if ($loop->first)
                    <figure class="media-type media-accepted media-left">
                        <img src="{{asset('img/icons/accepted.png')}}" alt="">
                    </figure>
                    @else
                    <figure class="media-type media-answer media-left">
                        <img src="{{asset('img/icons/answer.png')}}" alt="">
                    </figure>
                    @endif
                    <div class="media-content">
                        <div class="content media-post">
                            <p>
                                <strong>{{$post->author->name}}</strong>
                            </p>
                            <p>
                               {!! $post->content !!}
                            </p>

                            @if( $question->isYours() )
                                <form method="POST" action="{{action('PostController@update', $post->id)}}">
                                    {{ csrf_field()}}
                                    <input type="hidden" name="_method" value="put">
                                    @if ($post->accepted_answer)
                                    <button type="submit" class="button is-warning" value="0" name="accepted">Cancel acceptation</button>
                                    @elseif(! $question->isAccepted() )
                                    <button type="submit" class="button is-success" value="1" name="accepted">Accept this answer</button>
                                    @endif
                                </form>
                            @endif
                            <div class="button-group">

                                <a href="" class="btn-add-comment button is-info">Add comment</a>
                                @include('partials.minis._vote-group')
                            </div>
                            <div class="form-comment-hidden">
                                @include('partials/_create-comment')
                            </div>
                            <h3 class="is-3">{{count($post->comments)}} comments</h3>
                            <div class="comment-box">
                                @foreach($post->comments as $comment)
                                    <article class="media">
                                        <div class="content media-post-comment">
                                            <strong>{{$comment->author->name}}</strong>

                                            <p>{!! nl2br($comment->content) !!}</p>
                                        </div>
                                    </article>
                                @endforeach
                            </div>


                        </div>


                    </div>
                </article>
                @endforeach

            </div>
        </article>
    </div>
