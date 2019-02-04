@extends('webadmin.layouts.dashboard_admin')

@section('style')
	@include('webadmin.includes.datatables-css')
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
		<div class="responsive-table">
	    <table class="table table-striped table-condensed table-hover _table">
        <thead>
					<tr>
						<th style="width:20%;" class="text-center">Name</th>
						<th style="width:20%;" class="text-center">Address</th>
						<th style="width:20%;" class="text-center">Phone</th>
						<th style="width:20%;" class="text-center">Balance</th>
						<th style="width:20%;" class="text-center">Prev Balance</th>
					</tr>
        </thead>
        <tbody></tbody>
	    </table>
		</div>
  </div>
</div>
@endsection

@section('scripts')
@include('webadmin.includes.datatables-js')
<script type="text/javascript">
	var table = jQuery('._table').DataTable({
		dom : 'Bfrtip',
		select : true,
		ordering : false,
		processing : false,
		serverSide : true,
		buttons : [
		  {
		    text : '<i class="mdi mdi-plus"></i> Add',
		    className : 'btn btn-primary btn-sm',
		    action  : function()
		    {
		      jQuery('#myModalLabel').html('Add Data');
		      jQuery.get('{{ route("clients.create") }}', function(res) {
		          jQuery('.modal-body').html(res);
		      });
		      _modal();
		    }
		  },
		  {
		    text : '<i class="mdi mdi-pencil"></i> Edit',
		    className : 'btn btn-primary btn-sm',
		    action  : function(e, dt, node, config)
		    {
		      var res = dt.row( { selected: true } ).data();
		      jQuery('#myModalLabel').html('Data Information');
		      jQuery('.modal-body').html(errorAlert("Silakan pilih data terlebih dahulu."));
		      if(res != undefined ) {
		        var _url = replaceUrlId('{{ route("clients.show","ID") }}',res.id);
		        jQuery.get(_url + '?mode=detail', function(res) {
		            jQuery('.modal-body').html(res);
		        });
		      }
					_modal();
		    }
		  },
		  {
		    text : '<i class="mdi mdi-information"></i> Details',
		    className : 'btn btn-primary btn-sm',
		    action  : function(e, dt, node, config)
		    {
		      var res = dt.row( { selected: true } ).data();
		      jQuery('#myModalLabel').html('Data Information');
		      jQuery('.modal-body').html(errorAlert("Silakan pilih data terlebih dahulu."));
		      if(res != undefined ) {
		        var _url = replaceUrlId('{{ route("clients.show","ID") }}',res.id);
		        jQuery.get(_url + '?mode=detail', function(res) {
		            jQuery('.modal-body').html(res);
		        });
		      }
					_modal();
		    }
		  },
	    {
	      text : '<i class="mdi mdi-history"></i> Mutation ',
	      className : 'btn btn-primary btn-sm',
	      action  : function(e, dt, node, config)
	      {
	      	var res = dt.row( { selected: true } ).data();
	      	if(res != undefined ) {
	      		var _url = replaceUrlId('{{ route("mutation.index","ID") }}', res.id);
	      		return location.href = _url;
	      	}

		      jQuery('#myModalLabel').html('Mutation');
		      jQuery('.modal-body').html(errorAlert("Select data before this button clicked."));
	      	_modal();
	      }
	    },
	    {
	      text : '<i class="mdi mdi-cash"></i> Transaction',
	      className : 'btn btn-primary btn-sm',
	      action  : function(e, dt, node, config)
	      {
		      var res = dt.row( { selected: true } ).data();
		      jQuery('#myModalLabel').html('Deposit / Withdraw');
		      jQuery('.modal-body').html(errorAlert("Select data before this button clicked."));
		      if(res != undefined ) {
		        var _url = replaceUrlId('{{ route("clients.show","ID") }}',res.id);
		        jQuery.get(_url + '?mode=trx', function(res) {
							jQuery('.modal-body').html(res);
		        });
		      }
					_modal();
	      }
	    },
      {
        text : '<i class="mdi mdi-refresh"></i> Refresh',
        className : 'btn btn-primary btn-sm',
        action  : function() {
    			table.ajax.reload();
        }
      },
		],
		columns : [
			{
				data : function(data) {

					var middle_name = data.middle_name;
					if(data.middle_name == null) {
						var middle_name = '';
					}

					var last_name = data.last_name;
					if(data.last_name == null) {
						var last_name = '';
					}

					return data.first_name + ' ' + middle_name + ' ' + last_name;
				},
				name : 'name'
			},
			{
				data : 'address',
				name : 'address',
			},
			{
				data : 'phone',
				name : 'phone',
				className : 'text-center'
			},
			{
				data : function(data) {
					return toRupiah(data.balance);
				},
				name : 'balance',
				className : 'text-right'
			},
			{
				data : function(data) {
					return toRupiah(data.previous_balance);
				},
				name : 'previous_balance',
				className : 'text-right'
			},
		],
		ajax : { url : "{{ Route('clients.index') }}" }
	});
	/*
	*
	*   < =========== BUTTON ADD =========== >
	*/
	Document.on('click','#insert-data', function(e)
	{
		var param = {
	    url : "{{ Route('clients.store') }}",
	    dataType : "json",
	    ReqMethod : 'post',
	    SendData : serializer(e, '#add_form'),
	    msg : {
	      Timeout : 2000,
	      beforeSend : 'Memproses...',
	      errors : "Error silakan coba lagi!",
	      success : 'Done!'
	    }
		};
		AjaxRequests(param);
		table.ajax.reload();
	});
	/*
	*
	*   < =========== BUTTON UPDATE =========== >
	*/
	Document.on('click','#update-data', function(e)
	{
		var i = jQuery('#edit_form').attr('data-id');
		var param = {
		  url : "{{Route('clients.update','')}}/" + i,
		  dataType : "json",
		  ReqMethod : 'put',
		  SendData : serializer(e, '#edit_form'),
		  msg : {
		    Timeout : 2000,
		    beforeSend : 'Memproses...',
		    errors : "Error silakan coba lagi!",
		    success : 'Done!'
		  }
		};
		AjaxRequests(param);
		table.ajax.reload();
	});
	/*
	*
	*   < =========== BUTTON DELETE =========== >
	*/
	Document.on('click','#delete-data', function(e)
	{
		var i = jQuery('#delete-data').attr('data-id');
		var param = {
			url : "{{Route('clients.destroy','')}}/" + i,
			dataType : "json",
			ReqMethod : 'delete',
			SendData : null,
			msg : {
				Timeout : 2000,
				beforeSend : 'Memproses...',
				errors : "Error silakan coba lagi!",
				success : 'Done!'
			}
		};
		AjaxRequests(param);
		table.ajax.reload();
	});
	/*
	*
	*   < =========== BUTTON ADD TRANSACTION =========== >
	*/
	Document.on('click','#insert-transaction-data', function(e)
	{
		var param = {
	    url : "{{ Route('transaction.add') }}",
	    dataType : "json",
	    ReqMethod : 'post',
	    SendData : serializer(e, '#add_transaction_form'),
	    msg : {
	      Timeout : 2000,
	      beforeSend : 'Memproses...',
	      errors : "Error silakan coba lagi!",
	      success : 'Done!'
	    }
		};
		AjaxRequests(param);
		table.ajax.reload();
	});
</script>
@endsection