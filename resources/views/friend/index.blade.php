<h1 align="center">Friends</h1>

@forelse($friends as $friend)
<p>{{$friend->name}}</p>
    @empty
    <div class="panel-content">
        You don't have any friends
    </div>

@endforelse