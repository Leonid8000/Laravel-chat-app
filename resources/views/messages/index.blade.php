    <div class="message-wrapper">
        <ul class="messages">
            @foreach($messages as $message)
             <li class="message clearfix">
                <div class="{{ ($message->from == Auth::id()) ? 'sent' : 'received' }}">
                    <p class="message-text">{{ $message->message }}</p>
                    <p class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
                </div>
             </li>
              @endforeach
        </ul>
    </div>

<div class="input-text">
    <input type="text" class="submit messanger-btn" name="message" placeholder="Write a message...">
</div>



