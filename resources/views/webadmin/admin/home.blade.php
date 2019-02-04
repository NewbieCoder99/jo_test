@extends('webadmin.layouts.dashboard_admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h4 class="m-t-0">Your Title</h4>
                <div style="height: 300px"></div>
                {{ Auth::user() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
	<script type="text/javascript">
	</script>
@endsection

@section('style')

@endsection