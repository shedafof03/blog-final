<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/">{{env('APP_NAME')}}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                @if(\Auth::check())
                    @if(\Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="/publish-post">Publish Post</a>
                        </li>
                    @endif
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
                @if(\Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li> 
                @endif
                @if(\Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li><li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>

                @endif
            </ul>
        </div>
    </div>
</nav>