<div class="topbar">
    <div class="topbar-left">
        <div class="text-center">
            <a href="" class="logo">
                <span>Web</span>Admin</a>
                @if(Auth::user()->hasRole('superadmin'))
                  <a href="{{ route('dashboard.admin', Session::get('locale') )}}" class="logo-sm">
                @else
                  <a href="{{ route('dashboard.member', Session::get('locale') )}}" class="logo-sm">
                @endif
                    <span>W</span>
                </a>
            </div>
    </div>
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button type="button" class="button-menu-mobile open-left waves-effect waves-light">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>

                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="dropdown hidden-xs">
                        <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light notification-icon-box" data-toggle="dropdown" aria-expanded="true">
                            <i class="fa fa-dollar"></i>
                            <span class="badge badge-xs badge-danger">
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg">
                            <li class="text-center notifi-title">
                                Vault
                            </li>
                            <li class="list-group">
                                <a href="javascript:void(0);" class="list-group-item">
                                    <div class="media">
                                        <div class="media-heading">
                                            Your order is placed
                                        </div>
                                        <p class="m-0">
                                            <small>
                                                Dummy text of the printing and typesetting industry.
                                            </small>
                                        </p>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <small class="text-primary">
                                        See all notifications
                                    </small>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="hidden-xs">
                        <a href="#" id="btn-fullscreen" class="waves-effect waves-light notification-icon-box">
                            <i class="mdi mdi-fullscreen"></i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                            <img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ Auth::user()->name }}" alt="user-img" class="img-circle">
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    Settings
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    Lock screen
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="javascript:void(0)">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>