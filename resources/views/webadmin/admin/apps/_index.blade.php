@extends('webadmin.layouts.dashboard_admin')

@section('style')
	{{-- Todo --}}
@endsection

@section('content')
<div class="row">
<div class="col-lg-12">
  <ul class="nav nav-tabs navtab-bg">
    <li class="active">
      <a href="#form" data-toggle="tab" aria-expanded="true">
        <span class="visible-xs"><i class="fa fa-home"></i></span>
        <span class="hidden-xs">Setting</span> </a>
    </li>
    <li class="">
      <a href="#help" data-toggle="tab" aria-expanded="false">
        <span class="visible-xs"><i class="fa fa-help"></i></span>
        <span class="hidden-xs">Help</span>
      </a>
    </li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="form">
      @include($include)
    </div>
    <div class="tab-pane" id="help">
      <center>
        <h2>HTML Code CKEditor</h2><br>
        <script src="https://gist.github.com/NewbieCoder99/d86e2bd48efadc7ef9d0868f26da9efe.js"></script>
      </center>
    </div>
  </div>
</div>
</div>
@endsection

@section('scripts')
  <script src="{{url('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
  <script type="text/javascript">
    /*
    *
    *   < =========== BUTTON UPDATE =========== >
    */
    Document.on('click','#update-data', function(e)
    {
      var param = {
        url : "{{Route('app.update')}}",
        dataType : "json",
        ReqMethod : 'put',
        SendData : serializer(e,'#edit_form'),
        msg : {
          Timeout : 2000,
          beforeSend : 'Memproses...',
          errors : "Error silakan coba lagi!",
          success : 'Done!'
        }
    	};
      AjaxRequests(param);
      _modal()
    });
    jQuery('.about').ckeditor();
    jQuery('.contact').ckeditor();
    jQuery('.our_team').ckeditor();
    jQuery('.services').ckeditor();
  </script>
@endsection