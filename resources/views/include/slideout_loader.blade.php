<div class="sidebar-profile">
    <div class="sidebar-profile-image">
        <img src="{{ asset('assets/images/profile-image.png') }}" class="circle" alt="">
    </div>
    <div class="sidebar-profile-info">
        <a>
            <p>{{ Auth::user()->name }}</p>
            <span>
                {{ Auth::user()->email }}
            </span>
        </a>
    </div>
</div>

<ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion" >

    @if(Auth::user()->roles[0]->role_name == 'admin')
        <li class="no-padding {{ Request::segment(2) == '' ? 'active' : '' }}">
            <a class="waves-effect waves-grey active" href="{{url('admin')}}">
                <i class="fa fa-home material-icons"></i> Dashboard
            </a>
        </li>
        <li class="no-padding {{ Request::segment(2) == 'pages' ? 'active' : ''}}">
            <a class="collapsible-header waves-effect waves-grey {{ Request::segment(2) == 'pages' ? 'active' : ''}}">
                <i class="fa fa-edit"></i> Pages
                <i class="nav-drop-icon material-icons">keyboard_arrow_right</i>
            </a>
            <div class="collapsible-body">
                <ul>
                    <li class="{{ Request::segment(3) == 'tags' ? 'grey lighten-2' : ''}}">
                        <a href="{{ route('tags.index') }}">Tags</a>
                    </li>
                    <li class="{{ Request::segment(3) == 'categories' ? 'grey lighten-2' : ''}}">
                        <a href="{{ route('categories.index') }}">Categories</a>
                    </li>
                    <li class="{{ Request::segment(3) == 'posts' ? 'grey lighten-2' : ''}}">
                        <a href="{{ route('posts.index') }}">Posts</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="no-padding {{ Request::segment(2) == 'google-service' ? 'active' : ''}}">
            <a class="collapsible-header waves-effect waves-grey {{ Request::segment(2) == 'google-service' ? 'active' : ''}}">
                <i class="fab fa-google material-icons"></i> Google Service
                <i class="nav-drop-icon material-icons">keyboard_arrow_right</i>
            </a>
            <div class="collapsible-body">
                <ul>
                    <li class="{{ Request::segment(3) == 'youtube' ? 'grey lighten-2' : ''}}">
                        <a href="{{ route('youtube.index') }}">Youtube</a>
                    </li>
                    <li class="{{ Request::segment(3) == 'gmail' ? 'grey lighten-2' : ''}}">
                        <a href="{{ route('gmail.index') }}">Gmail</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="no-padding {{ Request::segment(2) == 'settings' ? 'active' : ''}}">
            <a class="collapsible-header waves-effect waves-grey {{ Request::segment(2) == 'settings' ? 'active' : ''}}">
                <i class="fa fa-cog material-icons"></i> Settings
                <i class="nav-drop-icon material-icons">keyboard_arrow_right</i>
            </a>
            <div class="collapsible-body">
                <ul>
                    <li class="{{ Request::segment(3) == 'audits' ? 'grey lighten-2' : ''}}">
                        <a href="{{ route('audits.index') }}">Audits</a>
                    </li>
                    <li class="{{ Request::segment(3) == 'roles' ? 'grey lighten-2' : ''}}">
                        <a href="{{ route('roles.index') }}">Roles</a>
                    </li>
                    <li class="{{ Request::segment(3) == 'administrations' ? 'grey lighten-2' : ''}}">
                        <a href="{{ route('administrations.index') }}">
                            Administrations
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    @endif

    @if(Auth::user()->roles[0]->role_name == 'user')
        <li class="no-padding {{ Request::segment(1) == 'home' ? 'active' : '' }}">
            <a class="waves-effect waves-grey active" href="{{url('user')}}">
                <i class="material-icons">home</i> Dashboard
            </a>
        </li>
        <li class="no-padding {{ Request::segment(1) == 'setting' ? 'active' : '' }}">
            <a class="waves-effect waves-grey active" href="{{url('user')}}">
                <i class="fa fa-wrench material-icons"></i> Setting
            </a>
        </li>
    @endif

    <li class="no-padding">
        <a class="waves-effect waves-grey active" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out-alt material-icons"></i> {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
<div class="footer">
    <p class="copyright"></p>
</div>