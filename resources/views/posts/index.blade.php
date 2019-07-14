@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($posts as $post)
        <div class="row" >
            <div class="col-6 offset-3 p-3 d-flex align-items-center"style="border:1px solid #E6E6E6;">
                <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100 mr-3" style="max-width:40px;">
                <div class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a></div>
            </div>
            <div class="col-6 offset-3" style="border:1px solid #E6E6E6;">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        </div>
        <div class="row   pb-4">
            <div class="col-6 offset-3"style="border:1px solid #E6E6E6;">
                <div>
                    
                        <img src="/svg/heart-regular.svg"style="height:20px;"class="mr-3"><img src="/svg/comment-regular.svg"style="height:20px">
                </div>
                <div>
                    <p> <span class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a> :</span> {{ $post->caption }}</p>
                </div>
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
