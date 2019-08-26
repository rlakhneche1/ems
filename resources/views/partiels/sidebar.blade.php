<!-- START PAGE SIDEBAR -->
<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="/home">E - M</a>
            <a href="#" class="x-navigation-control"></a>
        </li>  
        <li class="xn-profile">
            <a href="/home" class="profile-mini">
                <img src="{{ asset('assets/images/users/avatar.jpg') }}" alt="User"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="{{ asset('assets/images/users/avatar.jpg') }}" alt="User"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">{{ Auth::user()->name }}</div>
                    <div class="profile-data-title">{{ Auth::user()->roles[0]->name }}</div>
                </div>
                <div class="profile-controls">
                    <a href="/profile" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="#" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                </div>
            </div>                                                                        
        </li>                                                                    
        <li class="xn-title">Navigation</li>
        <li>
            <a href="/home"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
        </li>
        @ifUserCan('user.create')
        <li>
            <a href="{{ route('user.create') }}"><span class="fa fa-plus"></span> <span class="xn-text">Add a user</span></a>
        </li>
        @endif
        @ifUserCan('user.index')
        <li>
            <a href="{{ route('user.index') }}"><span class="fa fa-sort-alpha-asc"></span> <span class="xn-text">Users list</span></a>
        </li>
        @endif
        @ifUserCan('role.create')
        <li>
            <a href="{{ route('role.create') }}"><span class="fa fa-plus"></span> <span class="xn-text">Add a role</span></a>
        </li>
        @endif
        @ifUserCan('role.index')
        <li>
            <a href="{{ route('role.index') }}"><span class="fa fa-sort-alpha-asc"></span> <span class="xn-text">List of roles</span></a>
        </li>
        @endif
        @ifUserCan('permission.create')
        <li>
            <a href="{{ route('permission.create') }}"><span class="fa fa-plus"></span> <span class="xn-text">Add permission</span></a>
        </li> 
        @endif
        @ifUserCan('permission.index')
        <li>
            <a href="{{ route('permission.index') }}"><span class="fa fa-sort-alpha-asc"></span> <span class="xn-text">List of permissions</span></a>
        </li> 
        @endif
        @ifUserCan('employe.create')
        <li>
            <a href="{{ route('employe.create') }}"><span class="fa fa-plus"></span> <span class="xn-text">Add an employee</span></a>
        </li>
        @endif
        @ifUserCan('employe.index')
        <li>
            <a href="{{ route('employe.index') }}"><span class="fa fa-sort-alpha-asc"></span> <span class="xn-text">List of employees</span></a>
        </li> 
        @endif                                      
    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->