<div class="left side-menu">
  <div class="sidebar-inner slimscrollleft">
    <div class="user-details">
      <div class="text-center">
        <img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ Auth::user()->name }}" alt="" class="img-circle">
      </div>
      <div class="user-info">
        <div class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="javascript:void(0)">
                @lang('menu.profile')
              </a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  @lang('menu.logout')
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div id="sidebar-menu">
      <ul>

        <li>
          @if(Auth::user()->hasRole('superadmin'))
            <a href="{{ route('dashboard.admin', Session::get('locale') )}}">
          @else
            <a href="{{ route('dashboard.member', Session::get('locale') )}}">
          @endif
            <i class="mdi mdi-home"></i>
            <span>
                @lang('menu.home')
            </span>
          </a>
        </li>

        <li class="has_sub">
          <a href="javascript:void(0)">
            <i class="mdi mdi-database"></i>
            <span>
              @lang('menu.master.default')
            </span>
            <span class="pull-right">
              <i class="mdi mdi-plus"></i>
            </span>
          </a>
          <ul class="list-unstyled">
            <li>
              <a href="{{ route('clients.index') }}">
                @lang('menu.master.one')
              </a>
            </li>
          </ul>
        </li>

        @if(Auth::user()->hasRole('superadmin'))
          <li class="has_sub">
            <a href="{{ url('settings') }}">
              <i class="fa fa-users"></i>
              <span>
                @lang('menu.administrations.default')
              </span>
              <span class="pull-right">
                <i class="mdi mdi-plus"></i>
              </span>
            </a>
              <ul class="list-unstyled">
                <li>
                  <a href="{{ route('roles.index') }}">
                    @lang('menu.administrations.roles')
                  </a>
                  <a href="{{ route('users.index') }}">
                    @lang('menu.administrations.users')
                  </a>
                  <a href="{{ route('audits.index') }}">
                    @lang('menu.administrations.audit')
                  </a>
                </li>
              </ul>
          </li>
        @endif

        <li class="has_sub">
          <a href="{{ url('settings') }}">
            <i class="mdi mdi-settings"></i>
            <span>
              @lang('menu.settings.default')
            </span>
            <span class="pull-right">
              <i class="mdi mdi-plus"></i>
            </span>
          </a>
          <ul class="list-unstyled">
            <li>
              @if(Auth::user()->hasRole('superadmin'))
              <a href="{{ route('app.index') }}">
                @lang('menu.settings.application')
              </a>
              @endif
            </li>
          </ul>
        </li>
        <li>
          <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="mdi mdi-logout"></i>
            <span>
              @lang('menu.logout')
            </span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
              @csrf
          </form>
        </li>
      </ul>
    </div>
    <div class="clearfix"></div>
  </div>
</div>