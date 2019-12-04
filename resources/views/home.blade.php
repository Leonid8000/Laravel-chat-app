@extends('layouts.app')

@section('content')
    @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
<div class="container-fluid messanger-bg">
    <div class="row">
{{-- Users wrapper --}}
        <div class="col-md-3">
            <div class="user-wrapper" id="users-wrapper">
                <ul class="users">
            @foreach($friends as $friend)
                @foreach($users as $user)

                    @if($friend->id == $user->id)
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
                            @endif
                @endforeach
            @endforeach
                </ul>
            </div>
        </div>

        {{--<button id="arrow" class="arrow"><i class="fas fa-arrow-left"></i></button>--}}

        <div class="col-md-9" id="messages">
            @include('messages.default')
        </div>

    </div>
</div>
@endsection
