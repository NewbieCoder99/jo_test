<script src="{{ asset('assets/plugins/jquery/jquery-2.2.0.min.js') }}"></script>
<script src="{{ asset('assets/themes/materialize/plugins/materialize/js/materialize.min.js') }}"></script>
<script src="{{ asset('assets/themes/materialize/plugins/material-preloader/js/materialPreloader.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-blockui/jquery.blockui.js') }}"></script>
<script src="{{ asset('assets/themes/materialize/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/themes/materialize/plugins/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('assets/themes/materialize/js/alpha.min.js') }}"></script>
<script src="{{ asset('assets/themes/materialize/js/jquery.fancybox.min.js') }}"></script>

<script src="{{ asset('assets/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/Select-1.2.5/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/Buttons-1.5.1/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/Buttons-1.5.1/js/buttons.html5.min.js') }}"></script>

<script type="text/javascript">
	/*
	*
	*	< =========== VARIABLES INITIALIZE =========== >
	*/
	var Document = jQuery(document),
		BlueButtonSmall = 'btn-floating btn blue btn-small waves-effect waves-light';
	/*
	*
	*	< =========== SERIALIZE FUNCTION =========== >
	*/
	function serializer(e,id)
	{
		e.preventDefault();
		return jQuery(id).serialize();
	}
	/*
	*
	*	< =========== NOTIFY FUNCTION =========== >
	*/
	function notify(msg,to)
	{
		return Materialize.toast(msg, to);
	}
	/*
	*
	*	< =========== GET TOKEN FUNCTION FROM META TAG =========== >
	*/
	function _token()
	{
		return { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') };
	}
	/*
	*
	*	< =========== MUTIPLE DATATABLE CONFIGURATION FUNCTION =========== >
	*/
	function configDatatables(param)
	{
		return {
			dom : param.dom,
			select : param.select,
			ordering : param.ordering,
			processing : param.processing,
			serverSide : param.serverSide,
			buttons : [
				{
					text : param.buttons.create.text,
					className : param.buttons.create.class,
					action	: function()
					{
			            // Ganti title pada modal
			            jQuery(param.buttons.create.ContentHeaderID)
			            	.html(param.buttons.create.ContentTextHeader);
			            // Ambil form tambah data dengan xhr request
			            jQuery.get(param.buttons.create.url, function(response)
			            {
			                jQuery(param.buttons.create.ContentID)
			                	.html(response);
			            });
			            // Open modal
			            jQuery('.modal').openModal();
					}
				},
				{
					text : param.buttons.edit.text,
					className : param.buttons.edit.class,
					action : function(e, dt, node, config)
					{
						var res = dt.row( { selected: true } ).data();
						if(res != undefined)
						{
							// Ganti title pada modal
							jQuery(param.buttons.edit.ContentHeaderID)
								.html(param.buttons.edit.ContentTextHeader);

							var _url 	= param.buttons.edit.url,
								find_ID = _url.search("ID");

							if(find_ID >= 0)
							{
								var _url = _url.replace('ID', res.id)
							}
							// Ambil form tambah data dengan xhr request
							jQuery.get(_url, function(response)
							{
							    jQuery(param.buttons.edit.ContentID)
							    	.html(response);
							});
							// Open modal
							return jQuery('.modal').openModal();
						}
						return notify(param.buttons.edit.notifySelect, 800);
					}
				},
				{
					text : param.buttons.delete.text,
					className : param.buttons.delete.class,
					action : function(e, dt, node, config)
					{
						var res = dt.row( { selected: true } ).data();
						if(res != undefined)
						{
							// Ganti title pada modal
							jQuery(param.buttons.delete.ContentHeaderID)
								.html(param.buttons.delete.ContentTextHeader);

							var _url 	= param.buttons.delete.url,
								find_ID = _url.search("ID");

							if(find_ID >= 0)
							{
								var _url = _url.replace('ID', res.id)
							}
							// Ambil form tambah data dengan xhr request
							jQuery.get(_url + '?mode=del_confirmation', function(response)
							{
							    jQuery(param.buttons.delete.ContentID)
							    	.html(response);
							});
							// Open modal
							return jQuery('.modal').openModal();
						}
						return notify(param.buttons.delete.notifySelect, 800);
					}
				},
				{
					text : param.buttons.detail.text,
					className : param.buttons.detail.class,
					action : function(e, dt, node, config)
					{
						var res = dt.row( { selected: true } ).data();
						if(res != undefined)
						{
							// Ganti title pada modal
							jQuery(param.buttons.detail.ContentHeaderID)
								.html(param.buttons.detail.ContentTextHeader);

							var _url 	= param.buttons.detail.url,
								find_ID = _url.search("ID");
							if(find_ID >= 0)
							{
								var _url = _url.replace('ID', res.id)
							}

							// Ambil form tambah data dengan xhr request
							jQuery.get(_url, function(response)
							{
							    jQuery(param.buttons.detail.ContentID)
							    	.html(response);
							});
							// Open modal
							return jQuery('.modal').openModal();
						}
						return notify(param.buttons.detail.notifySelect, 800);
					}
				}
			],
			columns : param.columns,
		    ajax : { url : param.url }
		};
	}
	/*
	*
	*	< =========== MUTIPLE AJAX REQUEST FUNCTION =========== >
	*/
	function AjaxRequests(param)
	{
		jQuery.ajax({
			url : param.url,
			dataType : param.dataType,
			type : param.ReqMethod,
			data : param.SendData,
			headers : _token(),
			beforeSend  : function() {
			    notify(param.msg.beforeSend, param.msg.Timeout);
			},
			error : function(res) {
				notify(param.msg.beforeSend,param.msg.Timeout);
			},
			success : function(res) {
				if(res.error == 1) {
					for (var i = 0; i < res.msg.length; i++) {
						notify(res.msg[i],param.msg.Timeout);
					}
				} else {
					notify(param.msg.success,param.msg.Timeout);
					notify(res.msg, param.msg.Timeout);
				}
			}
		});
	}
    jQuery('select').select2();
</script>