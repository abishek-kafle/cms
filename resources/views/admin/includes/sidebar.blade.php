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
                    <a href="{{route('bio.index')}}"><i class="la la-book"></i> <span>Bio</span></a>
                </li>

                @if(Session::get('admin_page') == 'about')
                    @php $active = "active" @endphp
                @else
                    @php $active = "" @endphp
                @endif
                <li class="{{$active}}">
                    <a href="{{route('about.index')}}"><i class="fa fa-address-card"></i> <span>About</span></a>
                </li>

                @if(Session::get('admin_page') == 'skills')
                    @php $active = "active" @endphp
                @else
                    @php $active = "" @endphp
                @endif
                <li class="{{$active}}">
                    <a href="{{route('skill.index')}}"><i class="la la-tasks"></i> <span>Skills</span></a>
                </li>

                @if(Session::get('admin_page') == 'timeline')
                    @php $active = "active" @endphp
                @else
                    @php $active = "" @endphp
                @endif
                <li class="{{$active}}">
                    <a href="{{route('timeline.index')}}"><i class="fa fa-trophy"></i> <span>Timeline</span></a>
                </li>

                @if(Session::get('admin_page') == 'blogs')
                    @php $active = "active" @endphp
                @else
                    @php $active = "" @endphp
                @endif
                <li class="{{$active}}">
                    <a href="{{route('blog.index')}}"><i class="fa fa-rss"></i> <span>Blogs</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
