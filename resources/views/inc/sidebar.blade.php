<nav class="sidebar-nav">
    <ul class="nav">
        @if (Auth::user()->admin && Auth::user()->author==false)
        {{-- expr --}}
        <li class="nav-title">User</li>
        <li class="nav-item">
            <a href="{{ route('user.dashboard') }}" class="nav-link active">
                <i class="icon icon-speedometer"></i> Dashboard
            </a>
        </li>
        <li class="nav-item  nav-dropdown">
            <a href="{{ route('user.comment') }}" class="nav-link ">
                <i class="icon icon-book-open"></i> Comments
            </a>
        </li>
        <li class="nav-item  nav-dropdown">
            <a href="{{ route('user.profile') }}" class="nav-link ">
                <i class="fa fa-user"></i> Profile
            </a>
        </li>
        @endif
        @if (Auth::user()->author==true)
        {{-- expr --}}
        <li class="nav-title">Author</li>
        <li class="nav-item  nav-dropdown">
            <a href="{{ route('author.dashboard') }}" class="nav-link">
                <i class="icon icon-speedometer"></i> Dashboard
            </a>
        </li>
        <li class="nav-item  nav-dropdown">
            <a href="{{ route('author.post') }}" class="nav-link">
                <i class="icon icon-paper-clip"></i> Posts
            </a>
        </li>
        <li class="nav-item  nav-dropdown">
            <a href="{{ route('author.comment') }}" class="nav-link">
                <i class="icon icon-umbrella"></i> Comment
            </a>
        </li>
        @endif
        @if (Auth::user()->admin==true)
        {{-- expr --}}
        <li class="nav-title">Admin</li>
        <li class="nav-item  nav-dropdown">
            <a href="#" class="nav-link">
                <i class="icon icon-speedometer"></i> Dashboard
            </a>
        </li>
        <li class="nav-item  nav-dropdown">
            <a href="#" class="nav-link">
                <i class="icon icon-paper-clip"></i> Posts
            </a>
        </li>
        <li class="nav-item  nav-dropdown">
            <a href="#" class="nav-link">
                <i class="icon icon-umbrella"></i> Comment
            </a>
        </li>
        <li class="nav-item  nav-dropdown">
            <a href="#" class="nav-link">
                <i class="icon icon-user"></i> User
            </a>
        </li>
        @endif
    </ul>
</nav>
