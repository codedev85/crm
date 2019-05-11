<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.show', [Auth::user()->id]) !!}"><i class="fa fa-edit"></i><span>My Profile</span></a>
</li>

@if(Auth::user()->role_id == 1 )
<li class="{{ Request::is('companies*') ? 'active' : '' }}">
        <a href="{!! route('companies.index') !!}"><i class="fa fa-edit"></i><span>Companies</span></a>
    </li>
    <li class="{{ Request::is('users*') ? 'active' : '' }}">
            <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Employees</span></a>
        </li>

    {{-- <li class="{{ Request::is('roles*') ? 'active' : '' }}">
        <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
    </li> --}}

    {{-- <li class="{{ Request::is('companies*') ? 'active' : '' }}">
        <a href="{!! route('companies.index') !!}"><i class="fa fa-edit"></i><span>Companies</span></a>
    </li> --}}
    <li class="{{ Request::is('roles*') ? 'active' : '' }}">
            <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
        </li>

@endif
{{-- <li class="{{ Request::is('empolyees*') ? 'active' : '' }}">
    <a href="{!! route('empolyees.index') !!}"><i class="fa fa-edit"></i><span>Empolyees</span></a>
</li> --}}




{{-- <li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li> --}}

