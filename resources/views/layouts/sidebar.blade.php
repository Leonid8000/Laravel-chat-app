
{{-- Sidebar header with info about auth user --}}
        @guest

        @if (Route::has('register'))

        @endif
        @else

            <div id="mySidepanel" class="sidepanel">
                <div class="sidebar-header">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="d-flex justify-content-center mt-1 pt-2">
            @if(Auth::user()->avatar == null)
                <img src="https://via.placeholder.com/150
C/O https://placeholder.com/" alt="" class="media-object">
            @else
            <img src="uploads/avatars/{{Auth::user()->avatar}}" alt="user avatar">
            @endif
        </div>

        <h4 class="text-center">{{ Auth::user()->name }}</h4>
        <p class="text-center">{{ Auth::user()->email }}</p>
                </div>

                {{--<div class="card-header" id="headingOne">--}}
                    {{--<h5 class="mb-0">--}}
                        {{--<i class="fas fa-user-friends"></i><button class="btn btn-link" type="button">New Group</button>--}}
                    {{--</h5>--}}
                {{--</div>--}}

                {{--<div class="card-header" id="headingOne">--}}
                    {{--<h5 class="mb-0">--}}
                        {{--<i class="fas fa-flag"></i><button class="btn btn-link" type="button">New Chanel</button>--}}
                    {{--</h5>--}}
                {{--</div>--}}

{{-- Contacts --}}
                <div class="accordion" id="accordionExample">
                    <div class="card z-depth-0 bordered">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <i class="far fa-address-book"></i><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseAllContacts"
                                                                 aria-expanded="true" aria-controls="collapseOne">
                                    Contacts
                                </button>
                            </h5>
                        </div>
                        <div id="collapseAllContacts" class="collapse" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">


                                <a class="accordion-item"  data-toggle="modal" data-target="#modal3Contacts">
                                    <i class="fas fa-edit"></i>All contacts
                                </a>

                                <a class="accordion-item" data-toggle="modal" data-target="#modalAddContact">
                                    <i class="fas fa-user"></i> Add contacts
                                </a>

                            </div>
                        </div>
                    </div>
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

                                <a class="accordion-item" data-toggle="modal" data-target="#modalEditProfile">
                                    <i class="fas fa-edit"></i>Edit profile
                                </a>

                                <a class="accordion-item" data-toggle="modal" data-target="#modalChangeAvatar">
                                    <i class="fas fa-user"></i> Change Avatar
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <i class="far fa-moon"></i><button class="btn btn-link" type="button">Night Mode</button>

<!-- Rounded switch Night mode -->
                        <label class="switch">
                            <input type="checkbox" id="night-mode-btn" class="night-mode-btn">
                            <span class="slider round"></span>
                        </label>
                    </h5>
                </div>


                    @guest

                    @if (Route::has('register'))

                    @endif
                    @else

                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <i class="fas fa-sign-out-alt"></i><button class="btn btn-link" type="button">

                                <a class="btn btn-link log-out-link" id="log-out" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <!-- Logout Btn -->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </button>
                        </h5>
                    </div>
                        @endguest
            </div>

            <!-- Modal Change Avatar -->
            @include('modal.avatar')

            {{--<!-- Modal Change Name and Email -->--}}
            @include('modal.profile')

            {{--<!-- Modal Contacts -->--}}
            @include('modal.contacts')

            {{--<!-- Modal ADD Contacts -->--}}
            @include('modal.addContact')

            @endguest
