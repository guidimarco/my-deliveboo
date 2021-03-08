<aside id="dashboard-nav-aside">
    <ul>
        <!-- user info -->
        <li class="my-4">
            <a href="{{ route('admin.home') }}" class="{{ (request()->is('admin')) ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <span class="aside-menu">
                    le mie info
                </span>
            </a>
        </li>
        <!-- restarant info -->
        <li class="my-4">
            <a href="{{ route('admin.restaurants.index') }}" class="{{ (request()->is('admin/restaurants*')) ? 'active' : '' }}">
                <i class="fas fa-utensils"></i>
                <span class="aside-menu">
                    i miei ristoranti
                </span>
            </a>
        </li>
        <!-- dish info -> CRUD -->
        <li class="my-4">
            <a href="{{ route('admin.dishes.index') }}" class="{{ (request()->is('admin/dishes*')) ? 'active' : '' }}">
                <i class="fas fa-hotdog"></i>
                <span class="aside-menu">
                    i miei piatti
                </span>
            </a>
        </li>
        <!-- orders info -->
        <li class="my-4">
            <a href="{{route('admin.orders')}}" class="{{ (request()->is('admin/orders*')) ? 'active' : '' }}">
                <i class="far fa-sticky-note"></i>
                <span class="aside-menu">
                    i miei ordini
                </span>
            </a>
        </li>
        {{-- <li class="my-4">
            <a href="{{ route('admin.stats') }}" class="{{ (request()->is('admin/stats*')) ? 'active' : '' }}">
                <i class="fas fa-chart-bar"></i>
                <span class="aside-menu">
                    statistiche
                </span>
            </a>
        </li> --}}
    </ul>
</aside>
