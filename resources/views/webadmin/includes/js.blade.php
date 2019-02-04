{{-- <script src="/assets/plugins/jquery/jquery-1.11.min.js"></script> --}}
<script src="{{ asset('assets/plugins/jquery/jquery-2.2.0.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-blockui/jquery.blockui.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery/fancybox/jquery.fancybox.min.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ionicons/4.4.1/collection/icon/icon.js"></script>
<script src="/assets/themes/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/plugins/modernizer/modernizer.min.js"></script>
<script src="/assets/plugins/jquery/detect.js"></script>
<script src="/assets/plugins/fastclick/fastclick.js"></script>
<script src="/assets/plugins/jquery/jquery.slimscroll.js"></script>
<script src="/assets/plugins/jquery/jquery.slimscroll.js"></script>
<script src="/assets/plugins/jquery/jquery-blockui/jquery.blockui.js"></script>
<script src="/assets/plugins/waves/waves.js"></script>
<script src="/assets/plugins/wow/wow.min.js"></script>
<script src="/assets/plugins/jquery/jquery.nicescroll.js"></script>
<script src="/assets/plugins/jquery/jquery.scrollTo.min.js"></script>
<script src="/assets/themes/webadmin/js/webadmin.js"></script>
<script type="text/javascript">
	var ajaxCall,
			Document = jQuery(document.body);
	/*
	*
	*	< =========== ARRAY REMOVE =========== >
	*/
	Array.prototype.remove = function(value)
	{
		var index = this.indexOf(value);
		if(index != -1){
			this.splice(index, 1);
		}
		return this;
	};
	/*
	*
	*	< =========== PUSH RECORD =========== >
	*/
	function push_record(x, y, delim, opt)
	{
		var split_x 	= x.split("\n");
		var data_array 	= new Array();
		if(opt == "mailist")
		{
			var split_y = y.split("\n");

			for(var i=0; i < split_x.length; i++)
			{
				var split_mps = split_x[i].split(delim);

				if(split_x[i].indexOf(delim) != -1 )
				{
					var email 		= jQuery.trim(split_mps[0]);
					var password 	= split_mps[1];
					data_array.push(email + delim + password);
				} else
				{
					var email 		= jQuery.trim(split_x[i]);
					var password 	= split_y[i];
					data_array.push(email + delim + password);
					console.log(y);
				}
			}
		} else
		{
			for(var i=0; i < split_x.length; i++)
			{
				var sock = jQuery.trim(split_x[i]);
				data_array.push(sock);
			}
		}

		return data_array;
	}
	/*
	*
	*	< =========== UPDATE TEXTBOX =========== >
	*/
	function updateTextBox(mp)
	{
		var mailpass = jQuery('#mailpass').val().split("\n");
		mailpass.remove(mp);
		jQuery('#mailpass').val(mailpass.join("\n"));
	}
	/*
	*
	*	< =========== STOP PROCESS AJAX REQUEST =========== >
	*/
	function stop_processing(msg)
	{
		ajaxCall.abort();
		alert(msg);
	}
	/*
	*
	*	< =========== SPLITER FUNCTION =========== >
	*/
	function splitter(param,delim)
	{
		return param.split(delim);
	}
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
	*	< =========== GET TOKEN FUNCTION FROM META TAG =========== >
	*/
	function _token()
	{
		return {
			'X-CSRF-TOKEN' : jQuery('meta[name="csrf-token"]').attr('content')
		};
	}
	/*
	*
	*	< =========== GET MODAL FUNCTION SHOW =========== >
	*/
	function _modal()
	{
		$('#ContentModal').modal('toggle')
	}
	/*
	*
	*	< =========== REPLACE ID WITH REAL ID =========== >
	*/
	function replaceUrlId(param,id)
	{
		if(param.search("ID") >= 0) {
			return param.replace('ID', id);
		}
	}
	/*
	*
	*	< =========== ERROR ALERT FUNCTION =========== >
	*/
	function errorAlert(param) {
		return '<div class="alert alert-danger alert-dismissible fade in">'
			+ param +
		'</div>';
	}
	/*
	*
	*	< =========== ERROR ALERT FUNCTION =========== >
	*/
	function successAlert(param) {
		return '<div class="alert alert-success alert-dismissible fade in">'
			+ param +
		'</div>';
	}
	/*
	*
	*	< =========== INFO ALERT FUNCTION =========== >
	*/
	function infoAlert(param) {
		return '<div class="alert alert-info alert-dismissible fade in">'
			+ param +
		'</div>';
	}
	/*
	*
	*	< =========== MODAL BODY CHANGER FUNCTION =========== >
	*/
	function modalBody(param) {
		return jQuery('.modal-body').html(param);
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
			    errorAlert(param.msg);
			},
			error : function(res) {
				errorAlert(param.msg);
			},
			success : function(res) {
				if(res.error == 1) {
					modalBody('');
					for (var i = 0; i < res.msg.length; i++) {
						jQuery('.modal-body').append(errorAlert(res.msg[i]))
					}
				} else {
					modalBody(successAlert(res.msg));
				}
			}
		});
	}
	/*
	*
	*	< =========== RUPIAH CONVERTER =========== >
	*/
	function toRupiah(v)
	{
		var	number_string = v.toString(),
		sisa 	= number_string.length % 3,
		rupiah 	= number_string.substr(0, sisa),
		ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

		if (ribuan) {
			var separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		return rupiah;
	}
</script>