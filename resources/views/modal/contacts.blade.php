<div class="modal fade" id="modal3Contacts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-bold" id="exampleModalLabel">Contacts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @forelse($friends as $friend)
                    @if($friend->avatar == null)
                        <img src="https://via.placeholder.com/150
C/O https://placeholder.com/" alt="" class="media-object" style="width: 50px; height: 50px; border-radius: 50%;">
                    @else
                        <img src="uploads/avatars/{{$friend->avatar}}" alt="friend avatar" style="width: 50px; height: 50px; border-radius: 50%;">
                    @endif
                    <p class="contact-name">{{$friend->name}}</p>
                @empty
                    <div class="panel-content">
                        You don't have any friends
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</div>