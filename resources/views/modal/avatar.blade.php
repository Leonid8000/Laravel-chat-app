<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Avatar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{route('avatar')}}" enctype="multipart/form-data">
                    @csrf
                    {{ csrf_field() }}

                    <input type="file" name="avatar" required>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <button type="submit" class="btn btn-primary mt-1">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>