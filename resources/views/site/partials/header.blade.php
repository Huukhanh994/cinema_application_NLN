<header class="header-section">
    <div class="container">
        <div class="header-wrapper">
            <div class="logo">
                <a href="index.html">
                    <img src="{{asset('assets_client/images/logo/logo.png')}}" alt="logo">
                </a>
            </div>
            <ul class="menu">
                <li>
                    <a href="#0" class="active">Home</a>
                    <ul class="submenu">
                        <li>
                            <a href="#0" class="active">Home One</a>
                        </li>
                        <li>
                            <a href="index-2.html">Home Two</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#0">movies</a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('movies.now_showing') }}">Movie Now Showing</a>
                        </li>
                        <li>
                            <a href="movie-list.html">Movie Coming Soom</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#0">events</a>
                    <ul class="submenu">
                        <li>
                            <a href="events.html">Events</a>
                        </li>
                        <li>
                            <a href="event-details.html">Event Details</a>
                        </li>
                        <li>
                            <a href="event-speaker.html">Event Speaker</a>
                        </li>
                        <li>
                            <a href="event-ticket.html">Event Ticket</a>
                        </li>
                        <li>
                            <a href="event-checkout.html">Event Checkout</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#0">sports</a>
                    <ul class="submenu">
                        <li>
                            <a href="sports.html">Sports</a>
                        </li>
                        <li>
                            <a href="sport-details.html">Sport Details</a>
                        </li>
                        <li>
                            <a href="sports-ticket.html">Sport Ticket</a>
                        </li>
                        <li>
                            <a href="sports-checkout.html">Sport Checkout</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#0">blog</a>
                    <ul class="submenu">
                        <li>
                            <a href="blog.html">Blog</a>
                        </li>
                        <li>
                            <a href="blog-details.html">Blog Single</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="contact.html">contact</a>
                </li>
                @guest
                <li class="header-button pr-0">
                    <a href="{{route('login')}}">login</a>
                    <a href="{{route('register')}}">sign up</a>
                </li>
                @else
                <li class="header-button pr-0">
                    <a href="#">{{Auth::user()->name}}</a>
                    <div class="dropdonw-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a href="{{route('logout')}}" class="dropdown-item" 
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{__('Logout') }}
                        </a>
                        <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display:none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
                
            </ul>
            <div class="header-bar d-lg-none">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>