<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('assets/brand/coreui.svg#full')  }} "></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('assets/brand/coreui.svg#signet') }}"></use>
        </svg>
    </div>

    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        @if(auth()->user()->is_admin)
            <li class="nav-item mt-auto">
                <a class="nav-link" href="{{ route('admin.pages.index') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-description') }}"></use>
                    </svg>
                    Pages
                </a>
            </li>
            <li class="nav-item mt-auto">
                <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                    </svg>
                    Users
                </a>
            </li>
            <li class="nav-title">Checklist Group</li>
            @foreach($admin_menu as $group)
                <li class="nav-group">
                    <a class="nav-link" href="{{route('admin.checklist_groups.edit',[$group])}}">
                        {{$group->name}}
                    </a>
                    @foreach($group->checklists as $checklist)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.checklist_groups.checklists.edit',[$group,$checklist])}}">
                                <span class="nav-icon"></span>
                                {{$checklist->name}}
                            </a>
                        </li>
                    @endforeach

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.checklist_groups.checklists.create',[$group])}}">
                            <span class="nav-icon"></span>
                            Create Checklist
                        </a>
                    </li>
            @endforeach

            <li class="nav-item mt-auto">
                <a class="nav-link" href="{{ route('admin.checklist_groups.create') }}">
                    Create Checklist Group
                </a>
            </li>
        @else
            @foreach($user_menu as $group)
                <li class="nav-title" data-coreui-i18n="theme">
                    {{$group['name']}}
                    @if($group['is_new'])
                        <span class="ml-3 badge bg-info text-uppercase" data-coreui-i18n="new">NEW</span>
                    @elseif($group['is_updated'])
                        <span class="ml-3 badge bg-warning text-uppercase" data-coreui-i18n="new">UPD</span>
                    @endif
                </li>
                @foreach($group['checklists'] as $checklist)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.checklist',$checklist['id'])}}">
{{--                            <span class="nav-icon"></span>--}}
                            {{$checklist['name']}}
                            @if($checklist['is_new'])
                                <span class="badge bg-info text-uppercase ms-auto" data-coreui-i18n="new">NEW</span>
                            @elseif($checklist['is_updated'])
                                <span class="badge bg-warning text-uppercase ms-auto" data-coreui-i18n="new">UPD</span>
                            @endif
                        </a>
                    </li>
                @endforeach
            @endforeach
        @endif

        <li class="nav-item mt-auto"><a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-description') }}"></use>
                </svg>
                Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>
