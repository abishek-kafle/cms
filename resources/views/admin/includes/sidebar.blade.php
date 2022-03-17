<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                @if(Session::get('admin_page') == 'dashboard')
                    @php $active = "active" @endphp
                @else
                    @php $active = "" @endphp
                @endif
                <li class="{{$active}}">
                    <a href="{{route('adminDashboard')}}"><i class="la la-dashboard"></i> <span> Dashboard</span></a>
                </li>
                @if(Session::get('admin_page') == 'profile')
                    @php $active = "active" @endphp
                @else
                    @php $active = "" @endphp
                @endif
                <li class="{{$active}}">
                    <a href="{{route('adminProfile')}}"><i class="la la-dashboard"></i> <span> Profile Update</span></a>
                </li>
                @if(Session::get('admin_page') == 'change_password')
                    @php $active = "active" @endphp
                @else
                    @php $active = "" @endphp
                @endif
                <li>
                    <a href="{{route('changePassword')}}"><i class="la la-dashboard"></i> <span> Change Password</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
