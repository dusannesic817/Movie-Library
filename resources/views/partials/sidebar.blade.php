@auth
<div class="wrapper">
    <aside id="sidebar">
        <div class="d-flex">
            <button class="toggle-btn" type="button">
                <i class="lni lni-grid-alt"></i>
            </button>
            <div class="sidebar-logo">
                <a href="/home">{{ config('app.name', 'Laravel') }}</a>
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-user"></i>
                    <span>{{ Auth::user()->name }}</span>
                </a>
            </li>
            
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                    data-bs-target="#authGenres" aria-expanded="false" aria-controls="authGenres">
                    <i class="lni lni-layout"></i>
                    <span>{{ __('Genres') }}</span>
                </a>
                <ul id="authGenres" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{ route('genre.index') }}" class="sidebar-link"> {{ __('All Genres') }}</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('genre.create') }}" class="sidebar-link">
                            {{ __('Create Genre') }}</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                    data-bs-target="#authFilms" aria-expanded="false" aria-controls="authFilms">
                    <i class="bi bi-film"></i>
                    <span>{{ __('Films') }}</span>
                </a>
                <ul id="authFilms" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{ route('film.index') }}" class="sidebar-link"> {{ __('All Films') }}</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('film.create') }}" class="sidebar-link">
                            {{ __('Create Film') }}</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                    data-bs-target="#authMembers" aria-expanded="false" aria-controls="authMembers">
                    <i class="lni lni-user"></i>
                    <span>{{ __('Members') }}</span>
                </a>
                <ul id="authMembers" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{ route('member.index') }}" class="sidebar-link">{{ __('All Members') }}</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('member.create') }}" class="sidebar-link">
                            {{ __('Create Member') }}</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                    data-bs-target="#authOrders" aria-expanded="false" aria-controls="authOrders">
                    <i class="bi bi-cart3"></i>
                    <span>{{ __('Orders') }}</span>
                </a>
                <ul id="authOrders" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{ route('order.index') }}" class="sidebar-link">{{ __('List of Orders') }}</a>
                    </li>
                </ul>
                <ul id="authOrders" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{ route('film.index') }}" class="sidebar-link">{{ __('Create an Order') }}</a>
                    </li>
                </ul>
            </li>
            
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                    data-bs-target="#authPerson" aria-expanded="false" aria-controls="authPerson">
                    <i class="bi bi-star-fill"></i>
                    <span>{{ __('Person') }}</span>
                </a>
                <ul id="authPerson" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{ route('person.index') }}" class="sidebar-link">{{ __('People') }}</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('person.create') }}" class="sidebar-link">
                            {{ __('Create Person') }}</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-cog"></i>
                    <span>Setting</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="lni lni-exit"></i>
                    <span>{{ __('Logout') }}</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>


            
            </li>
           
        </ul>

    </aside>


    <script>
    const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});
    </script>

    @endauth