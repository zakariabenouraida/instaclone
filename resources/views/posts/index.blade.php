@extends('layouts.app')

@section('content')
<div class="infinite-scroll">
<div class="container">
    @foreach ($posts as $post)
        <div class="row" >
            <div class="col-6 offset-3 p-3 d-flex align-items-center"style="border:1px solid #E6E6E6;">
                <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100 mr-3" style="max-width:40px;">
                <div class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a></div>
            </div>
            <div class="col-6 offset-3" style="border:1px solid #E6E6E6;padding:0;">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3"style="border:1px solid #E6E6E6;border-top:none;border-bottom:none">
                <div>
                    <img src="/svg/heart-regular.svg"style="height:20px;"class="mr-3"><img src="/svg/comment-regular.svg"style="height:20px">
                </div>
                <div>
                    <p> <span class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a> :</span> {{ $post->caption }}</p>
                </div>
            </div>
        </div> 
        <div class="col-6 offset-3 mb-3" style="border:1px solid #E6E6E6;border-top:none;">      
        @foreach($post->comments as $comment)
            <div class="row">
            <div class="col-6">
                    <div class="coms">
                        <p><strong>{{ $comment->user->username }}</strong>: {{$comment->comment}}</p>
                    </div>
                </div>
            </div>
        @endforeach
        <form action="/poo/comments" method="post">
            @csrf
            <div class="row pb-3">
            <div class="col-10  d-flex align-items-center">
                <input id="comment" name="comment" type="text" placeholder="Add comment..."class="form-control @error('comment') is-invalid @enderror" required autocomplete="comment">
                <input id="post_id" name="post_id" type="hidden" value="{{$post->id}}">
                        @error('comment')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="col-2  d-flex align-items-center">
                <button class="btn btn-primary">Send</button>
            </div>
            </div>
        </form>
        </div> 
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links()}}
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<img class="center-block" src="/images/loading.gif" alt="Loading..." />',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>
@endsection
