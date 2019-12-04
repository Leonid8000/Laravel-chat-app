<nav class="navbar navbar-expand-md shadow-sm" id="nav">
    @guest

    @if (Route::has('register'))

    @endif
    @else
        <button class="openbtn" onclick="openNav()">&#9776;</button>

    @endguest
    <div class="container" id="side-and-other">

    @include('layouts.sidebar')

    </div>
</nav>