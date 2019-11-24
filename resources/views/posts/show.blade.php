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
            <hr>
            <div class="row">
                <div class="col-12">
                    @foreach($post->comments as $comment)
                    <div class="coms">
                        <p><strong>{{ $comment->user->username }}</strong>: {{$comment->comment}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <like-button post-id="{{$post->id}}" likes="{{ $likes }}"></like-button>

            <div class="pr-5 ml-3 mb-2"><strong>{{$post->likers->count()}}</strong> likes</div>
            <like-counter></like-counter>

            <form action="/poo/comments" method="post">
                @csrf
                <div class="row">
                    <div class="col-10">
                        <textarea id="comment" cols="50" wrap="hard" name="comment" type="text" placeholder="Add comment..." class="form-control @error('comment') is-invalid @enderror" required autocomplete="comment"></textarea>
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
<script>
    new Vue({
        el: '#counter',
        data: {
            counter: $post - > likers - > count(),
            firstName: ''
        },
        methods: {
            // incrementValue: function(){
            //   return this.counter == ++this.counter;
            // },
            // resetValue: function(){
            //   this.counter = 0;
            // },
            // decrementValue: function(){
            //   return this.counter == --this.counter;
            // },
            incrementValue() {
                this.counter++;
            },
            decrementValue() {
                this.counter--;
            },
            resetValue() {
                this.counter = 0;
            },
            logName: function() {
                console.log('firstName:', this.firstName);
            }
        }
    })
</script>
@endsection