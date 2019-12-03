
    {{-- Sidebar header with info about auth user --}}
        @guest

        @if (Route::has('register'))

        @endif
        @else

            <div id="mySidepanel" class="sidepanel">
                <div class="sidebar-header">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="d-flex justify-content-center mt-1 pt-2">
            <img src="uploads/avatars/{{Auth::user()->avatar}}" alt="user avatar">
        </div>

        <h4 class="text-center">{{ Auth::user()->name }}</h4>
        <p class="text-center">{{ Auth::user()->email }}</p>
                </div>

                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <i class="fas fa-user-friends"></i><button class="btn btn-link" type="button">New Group</button>
                    </h5>
                </div>

                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <i class="fas fa-flag"></i><button class="btn btn-link" type="button">New Chanel</button>
                    </h5>
                </div>

                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <i class="far fa-address-book"></i><button class="btn btn-link" type="button">Contacts</button>
                    </h5>
                </div>

                {{-- Sidebar accardeon with settings(change name, email, password and avatar --}}
                <div class="accordion" id="accordionExample">
                    <div class="card z-depth-0 bordered">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <i class="fa fa-cog"></i><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                                                                 aria-expanded="true" aria-controls="collapseOne">
                                    Settings
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <a class="accordion-item" data-toggle="modal" data-target="#exampleModal2">
                                    <i class="fas fa-edit"></i>Edit profile
                                </a>
                                <a class="accordion-item" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-user"></i> Change Avatar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <i class="far fa-moon"></i><button class="btn btn-link" type="button">Night Mode</button>

                        <!-- Rounded switch -->
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </h5>
                </div>
            </div>

            @endguest
