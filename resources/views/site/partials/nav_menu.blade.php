<ul class="menu">
    <li>
        <a href="#0" class="active">Theaters</a>
        <ul class="submenu">
            <li>
                <a href="{{route('cinemas.index')}}" class="active">All CGV Cinemas</a>
            </li>
            <li>
                <a href="index-2.html">Special Cinemas</a>
            </li>
            <li>
                <a href="index-2.html">Opening Soon</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#0">movies</a>
        <ul class="submenu">
            <li>
                <a href="{{ route('movies.now_showing') }}">Now Showing</a>
            </li>
            <li>
                <a href="movie-list.html">Coming Soom</a>
            </li>
        </ul>
    </li>
    @if (!Auth::check())
        <li>
            <a href="#0">Membership</a>
            <ul class="submenu">
                <li>
                    <a href="events.html">My CGV</a>
                </li>
                <li>
                    <a href="event-details.html">Member Benefits</a>
                </li>
            </ul>
        </li>
    @endif
    <li>
        <a href="#0">Cultureplex</a>
        <ul class="submenu">
            <li>
                <a href="{{route('cultureplex.online_store')}}">Online Store</a>
            </li>
            <li>
                <a href="{{route('cultureplex.group_sale')}}">Group Sales</a>
            </li>
            <li>
                <a href="{{route('cultureplex.e_cgv')}}">E-CGV</a>
            </li>
            <li>
                <a href="{{route('cultureplex.cgv_restaurant')}}">CGV Restaurant</a>
            </li>
            <li>
                <a href="{{route('cultureplex.gift_card')}}">Gift Card</a>
            </li>
        </ul>
    </li>
    <li>
    <a href="{{route('contact.index')}}">contact</a>
    </li>
   
    @guest
    <li class="header-button pr-0">
        <a href="{{route('login')}}">join us</a>
        {{-- <a href="{{route('register')}}">sign up</a> --}}
    </li>
    @else
    <li>
        <a href="#0">{{Auth::user()->getFullNameAttribute()}}</a>
        <ul class="submenu">
            <li>
                <a href="{{route('account.profile')}}">Profile</a>
            </li>
            <li>
                <a href="{{route('account.orders')}}">Orders</a>
            </li>
            <li>
                <a href="{{route('logout')}}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{__('Logout') }}
                </a>
                <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display:none;">
                    @csrf
                </form>
            </li>
            
        </ul>
    </li>
    @endguest

</ul>