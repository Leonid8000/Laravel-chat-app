{{--<button id="arrow" class="arrow"><i class="fas fa-arrow-left"></i></button>--}}

    <div class="message-wrapper" id="message-wrapper">
        <ul class="messages">
            @foreach($messages as $message)

             <li class="message clearfix">
                <div class="{{ ($message->from == Auth::id()) ? 'sent' : 'received' }}">
                    <p class="message-text">{{ $message->message }}</p>
                    <p class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
                </div>

                @foreach($users as $user)

                    @if($message->from == $user->id)
                        <img src="uploads/avatars/{{$user->avatar}}" alt="" class="media-object message-avatar mb-2">
                    @endif

                @endforeach
             </li>
              @endforeach
        </ul>
    </div>

<div class="input-text">
    <input type="text" class="submit messanger-btn" name="message" placeholder="Write a message...">
</div>




