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
                @if(Session::get('admin_page') == 'bio')
                    @php $active = "active" @endphp
                @else
                    @php $active = "" @endphp
                @endif
                <li class="{{$active}}">
                    <a href="{{route('bio.index')}}"><i class="la la-dashboard"></i> <span>Bio</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
