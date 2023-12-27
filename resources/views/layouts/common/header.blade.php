<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button"
                onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg>
        </button>
        <a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="assets/brand/coreui.svg#full"></use>
            </svg>
        </a>


        <ul class="header-nav ms-3">
            <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#"
                                             role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md">
                        <svg class="nav-icon" height="20px" width="20px">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                        </svg>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <a class="dropdown-item"  href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <svg class="icon me-2">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                        </svg>
                        {{ __('Logout') }}</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</header>
