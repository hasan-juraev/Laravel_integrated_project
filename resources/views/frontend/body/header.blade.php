<header class="header" >
    <nav>
        <div class="hamburger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <ul class="nav-links">
            <div>
                <h1 class="logo">Haksenguz</h1>
            </div>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/news') }}">News</a></li>
            <li><a href="{{ url('/education') }}">Education</a></li>
            <li><a href="{{ url('/entertainment') }}">Entertainment</a></li>
            <li><a href="{{ url('/mosque') }}">Mosque</a></li>
            <li><a href="{{ url('/restaurant') }}">Restaurant</a></li>
            <li><a href="{{ url('/post-service') }}">Post Service</a></li>
            <li><a href="{{ url('/housing') }}">House renting</a></li>
            <a class="login-button" href="{{ url('/login') }}"> Login </a>
        </ul>
    </nav>