@extends('layouts.dashboard')
@section('content')
<div class="row no-m-t no-m-b">
    <div class="col s12 m12 l12">
        <div class="card invoices-card">
            <div class="card-content">
                <div class="row">
                	{{ Auth::user() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection