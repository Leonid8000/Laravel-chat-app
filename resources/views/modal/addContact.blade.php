<div class="modal fade" id="modalAddContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-bold" id="exampleModalLabel">Add contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('add-friend')}}" method="POST">
                    {{ csrf_field() }}
                    @csrf

                    {{-- Name --}}
                    <div class="form-group row">
                        <label for="fName" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="fName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="fName" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="form-group row">
                        <label for="fEmail" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                        <div class="col-md-6">
                            <input id="fEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-3 offset-md-4 col-sm-3">
                            <button type="submit" class="btn btn-dark">
                                {{ __('Add contact') }}
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>