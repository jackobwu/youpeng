<nav class="navbar has-shadow" role="navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
                <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
            </a>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start">
                @if(Auth::check())
                    <a href="{{ route('home') }}" class="navbar-item">Timeline</a>
                    <a href="{{ route('friends.index') }}" class="navbar-item">Friends</a>
                    <form action="{{ route('search.results') }}" class="navbar-item" role="search">   
                        <div class="control">
                            <input class="input" type="text" name="keyword" placeholder="Find People">
                        </div>   
                        <div class="control">
					        <button type="submit" class="button is-primary">Search</button>
                        </div>
				    </form>
                @endif    
            </div>
            <div class="navbar-end">
                @if(Auth::check())
                    <a href="{{ route('profile.index', ['username' => Auth::user()->name]) }}" class="navbar-item">{{ Auth::user()->getName() }}</a>
                    <a href="{{ route('profile.edit') }}" class="navbar-item">Update Profile</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="navbar-item">Sign Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="navbar-item">Sign in</a>
                    <a href="{{ route('register') }}" class="navbar-item">Sign up</a>
                @endif
            </div>
        </div>
    </div>
</nav>