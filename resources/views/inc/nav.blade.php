<nav class="navbar page-header">
    <a href="" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
        <i class="fa fa-bars"></i>
    </a>
    <a class="navbar-brand" href="{{ route('dashboard') }}">
        <img src="{{asset('backend/imgs/logo.png')}}" alt="logo">
    </a>
    <a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
        <i class="fa fa-bars"></i>
    </a>
    <ul class="navbar-nav ml-auto">
        @if (Auth::user()->author==true)
            {{-- expr --}}

        <a href="{{ route('author.create.post') }}" class="btn btn-success">Create Post</a>
        @endif
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{asset('backend/imgs/avatar-1.png')}}" class="avatar avatar-sm" alt="logo">
                <span class="small ml-1 d-md-down-none">{{Auth::user()->name}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">Account</div>
                <a href="{{ route('user.profile') }}" class="dropdown-item">
                    <i class="fa fa-user"></i> Profile
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fa fa-lock"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
</ul>
</nav>
