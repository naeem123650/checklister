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
            @foreach(\App\Models\ChecklistGroup::with('checklists')->get() as $group)
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

                    <li class="nav-group">
                        <a class="nav-link" href="{{route('admin.checklist_groups.checklists.create',[$group])}}">
                            Create Checklist
                        </a>
                    </li>
                </li>
            @endforeach

            <li class="nav-item mt-auto">
                <a class="nav-link" href="{{ route('admin.checklist_groups.create') }}">
                    Create Checklist Group
                </a>
            </li>
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
