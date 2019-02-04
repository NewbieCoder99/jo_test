<div class="row">
	{{ Form::model($data,['id' => 'add_transaction_form']) }}

		{{ Form::hidden('client_id', $data->id, [ 'class' => 'form-control','id' => 'client_id']) }}

  	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  		<div class="form-group">
  		{{ Form::label('client_transaction_type_id','Transaction Type', ['for' => 'client_transaction_type_id']) }}
  		{{ Form::select('client_transaction_type_id', App\Transaction_type::pluck('name','id')->all(), null, ['placeholder' => ' - Transaction Type -','class' => 'form-control','id' => 'client_transaction_type_id']) }}
  		</div>
  	</div>

  	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  		<div class="form-group">
  			{{ Form::label('amount','Amount', ['for' => 'amount']) }}
  			{{ Form::text('amount', null, ['class'=>'form-control','id' => 'amount']) }}
  		</div>
  	</div>

    <div class="modal-footer no-border">
    	<div class="form-group">
        {{ Form::button('Cancel', ['class'=>'btn btn-default waves-effect', 'data-dismiss' => 'modal']) }}
        {{ Form::button('Save', ['class'=>'btn btn-primary waves-effect waves-light', 'id' => 'insert-transaction-data']) }}
    	</div>
    </div>

	{{ Form::close() }}
</div>