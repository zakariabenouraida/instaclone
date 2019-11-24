@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($posts as $post)
    <div>
        <div class="row">
            <div class="col-6 offset-3 p-3 d-flex align-items-center" style=";">
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
            <div class="col-6 offset-3" style="">
                <div style="margin-top:5px">
                    <p> <span class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a> :</span> {{ $post->caption }}</p>
                </div>
                <hr>
                <div style="display:flex">
                    <!-- <like-button post-id="{{$post->id}}" likes="{{ $likes }}"></like-button> -->
                    <div class="pr-5 ml-3 mt-3 mb-3"><strong>{{$post->likers->count()}}</strong> likes</div>
                    <!-- <img src="/svg/heart-regular.svg" style="height:20px;" class="mr-3"><img src="/svg/comment-regular.svg" style="height:20px"> -->
                </div>

            </div>
        </div>

        <div class="col-6 offset-3 mb-3" style="">
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
                        <textarea id="comment" cols="50" wrap="hard" name="comment" type="text" placeholder="Add comment..." class="form-control @error('comment') is-invalid @enderror" required autocomplete="comment"></textarea>
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
    </div>

    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links()}}
        </div>
    </div>
</div>
@endsection