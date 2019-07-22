@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width:40px;">
                    </div>
                    <div>
                    <div class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a>
                    </div>
                    </div>
                </div>
                <hr>
                <p> <span class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a> :</span> {{ $post->caption }}</p>
            </div>
            <div class="row">
                <div class="col-12">
                    @foreach($post->comments as $comment)
                    <div class="coms">
                        <p><strong><a href="/profile/{{$comment->user->id}}"class="text-dark">{{ $comment->user->username }}</strong></a>: {{$comment->comment}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="container">
                <div class="row pb-3">
            <div>
                <!-- <img src="/svg/heart-regular.svg"style="height:20px;"class="mr-3"> -->
                <a href="#comment"><img src="/svg/comment-regular.svg"style="height:20px"></a>
            </div>
            </div>
            </div>
            <!-- <like-button user-id="{{$post->user->id}}" likes="{{$likes}}"></like-button> -->
            <!-- <like-button post-id="{{$post->id}}"></like-button> -->
            <form action="/poo/comments" method="post" >
            @csrf
                <div class="row">
                    <div class="col-10">
                            <input id="comment" name="comment" type="text" placeholder="Add comment..."class="form-control @error('comment') is-invalid @enderror" required autocomplete="comment">
                            <input id="post_id" name="post_id" type="hidden" value="{{$post->id}}">
                                @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
