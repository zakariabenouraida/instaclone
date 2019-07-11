@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($posts as $post)
        <div class="row" >
            <div class="col-6 offset-3 pb-3 d-flex align-items-center">
                <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100 mr-3" style="max-width:40px;">
                <div class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a></div>
            </div>
            <div class="col-6 offset-3">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col-6 offset-3">
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
