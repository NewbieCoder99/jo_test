<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Dashboard - Administrator</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('include.css')
    </head>
<body>
    <div class="loader-bg"></div>
    <!-- LOADER  -->
        @include('include.progress')
    <!-- ./END LOADER  -->
    <!-- MN-CONTENT  -->
        <div class="mn-content fixed-sidebar">
            <!-- HEADER  -->
                <header class="mn-header navbar-fixed">
                    <nav class="block blue">
                        @include('include.top_navbar')
                    </nav>
                </header>
            <!-- ./END HEADER -->
            <!-- ASIDE  -->
                <aside id="chat-sidebar" class="side-nav white">
                    <div class="side-nav-wrapper">
                        @include('include.chatsidebar_loader')
                    </div>
                </aside>
                <aside id="chat-messages" class="side-nav white">
                    @include('include.chatmessage_loader')
                </aside>
                <aside id="slide-out" class="side-nav white fixed">
                    <div class="side-nav-wrapper">
                        @include('include.slideout_loader')
                    </div>
                </aside>
            <!-- ./END ASIDE  -->
            <main class="mn-inner inner-active-sidebar">
                @yield('content')
            </main>
            <!-- FOOTER  -->
                <div class="page-footer">
                    @include('include.footer')
                </div>
            <!-- ./END FOOTER  -->
            @include('include.modal')
        </div>
    <!-- ./END MN-CONTENT  -->
    @include('include.scripts')
    @yield('scripts')
</body>
</html>