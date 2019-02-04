<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ $title }}</title>
    @include('webadmin.includes.meta')
    @include('webadmin.includes.css')
		<style type="text/css" media="screen">
			.select-style, .select-style:focus, select, option {
		    outline: none;
		    border :0px; 
		    border : #ccc 1px solid;
		    box-shadow:none;
		    border-radius:0;
		    cursor: pointer;
		    -webkit-appearance: none;
		    -moz-appearance: none;
		    appearance: none;
		    background:  url(../assets/images/arrowdown.gif) no-repeat 90% 50%;
			}	
		</style>
		@yield('style')
</head>

<body class="fixed-left">
	<div id="wrapper">
		@include('webadmin.includes.topbar')
		@include('webadmin.includes.side-menu')
		<div class="content-page">
		    <div class="content">
		        <div class="">
		            <div class="page-header-title">
		                <h4 class="page-title">{{ $name_page }}</h4>
		            </div>
		        </div>
		        <div class="page-content-wrapper ">
		            <div class="container">
		            	<div class="row">
		            		<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
		            			<div class="panel panel-primary">
		            				<div class="panel-body">
		            					@yield('content')
		            				</div>
		            			</div>
		            		</div>
		            	</div>
		            </div>
		        </div>
		    </div>
		    <footer class="footer"> © {{ date('Y') }} {{ env('APP_NAME') }} - All Rights Reserved. </footer>
		</div>
	</div>
	@include('webadmin.includes.modal')
    @include('webadmin.includes.js')
    @yield('scripts')
</body>
</html>
