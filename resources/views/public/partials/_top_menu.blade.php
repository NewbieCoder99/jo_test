<header id="header" class="header header-hide" style="padding-bottom:70px;">
  <div class="container">

    <div id="logo" class="pull-left">
      <img src="{{ url('sources/avocado-tech.png') }}" style="width:150px;height: 70px;">
      {{-- <h1>
        <a href="{{ url('/') }}" class="scrollto">
          <span>Avocado</span>Tech
        </a>
      </h1> --}}
    </div>

    <nav id="nav-menu-container" style="margin-top:15px;">
      <ul class="nav-menu">
        <li class="menu-active">
          <a href="{{ url('/') }}">
            @lang('public_menu.home')
          </a>
        </li>
        <li>
          <a href="#about-us">
            @lang('public_menu.about')
          </a>
        </li>
        <li>
          <a href="#get-contact">
            @lang('public_menu.contact')
          </a>
        </li>
        <li>
          <a href="#get-team">
            @lang('public_menu.team')
          </a>
        </li>
        <li>
          <a href="#get-service">
            @lang('public_menu.service')
          </a>
        </li>
      </ul>
    </nav><!-- #nav-menu-container -->

  </div>
</header><!-- #header -->
