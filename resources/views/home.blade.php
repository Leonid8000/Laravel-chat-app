@extends('layouts.app')

@section('content')
<div class="container-fluid messanger-bg">
    <div class="row">
{{-- Users wrapper --}}
        <div class="col-md-3">
            <div class="user-wrapper">
                <ul class="users">
            @foreach($users as $user)
                    <li class="user" id="{{$user->id}}">

                        @if($user->unread)
                        <span class="pending">{{ $user->unread }}</span>
                        @endif

                        <div class="media">
                            <div class="media-left">
                                @if($user->avatar == null)
                                <img src="https://via.placeholder.com/150
C/O https://placeholder.com/" alt="" class="media-object">
                                @else
                                <img src="uploads/avatars/{{$user->avatar}}" alt="" class="media-object">
                                @endif
                            </div>

                            <div class="media-body">
                                <p class="name">{{$user->name}}</p>
                                <p class="email">{{$user->email}}</p>
                            </div>
                        </div>
                    </li>
            @endforeach
                </ul>
            </div>
        </div>

        <div class="col-md-9" id="messages">
            {{--@include('messages.index')--}}
        </div>

    </div>
</div>
@endsection
