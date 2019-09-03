@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-3 p-5">
        @php 
            if($user->profile !==NULL){
        @endphp
                <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
        @php 
            }else{
        @endphp
            <img src="asset('storage/profile/ZOKKHUx8iiY6pkGeCrrWl2jnQqS51g5ydewRkpMG.png')" class="rounded-circle w-100">
        @php 
            }
        @endphp            
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{$user->username}}</div>
                @can ('view', $user->profile)
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                @endcan
                </div>
                @can ('update', $user->profile)
                    <a href="/p/create">Add new post</a>
                @endcan

            </div>
                @can ('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
                @endcan
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
            </div>


            @php 
            if($user->profile !==NULL){
        @endphp
                <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
                <div>{{$user->profile->description}}</div>
                <div><a href="#">{{$user->profile->url}}</a></div>
        @php 
            }else{
        @endphp
        <div class="pt-4 font-weight-bold"></div>
                <div></div>
                <div><a href="#"></a></div>        @php 
            }
        @endphp   
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
