@extends('webadmin.layouts.dashboard_admin')
@section('content')
	<div class="row">
		<div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
			Descriptions :
			<ol>
				@foreach(\App\Transaction_type::all() as $transactionType)
					<li>{{ $transactionType->name }}</li>
				@endforeach
			</ol>
			<br>
		</div>
		<div class="col-md-6 col-lg-6 col-xs-12 col-sm-12 text-right">
			{{ $transactions[0]->first_name.' '.$transactions[0]->middle_name.' '.$transactions[0]->last_name }}
		</div>
	  <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
			<div class="responsive-table">
				<table class="table table-condensed">
					<thead>
						<tr>
							<th class="text-center" style="width:5%;">No.</th>
							<th class="text-center" style="width:10%;">Date.</th>
							<th class="text-center" style="width:10%;">Code</th>
							<th class="text-center" style="width:10%;">Debit</th>
							<th class="text-center" style="width:10%;">Credit</th>
							<th class="text-center" style="width:10%;">Balance</th>
							<th class="text-center" style="width:10%;">Operator</th>
						</tr>
					</thead>
					<tbody>

						@php
							$balance = 0;
						@endphp

						@foreach($transactions as $key => $transaction)

							<tr>
								<td class="text-center">{{ $key + 1 }}</td>
								<td class="text-center">
									{{ $transaction->created_at->format('d/m/y') }}
								</td>
								<td class="text-center">
									{{ $transaction->client_transaction_type_id }}
								</td>
								<td class="text-right">
									@if($transaction->client_transaction_type_id == 1 || $transaction->client_transaction_type_id == 3)
										@php
											$balance = $balance + $transaction->amount;
										@endphp
										{{ number_format($transaction->amount,0,',','.') }}
									@endif
								</td>
								<td class="text-right">
									@if($transaction->client_transaction_type_id == 2)
										@php
											$balance = $balance - $transaction->amount;
										@endphp
										{{ number_format($transaction->amount,0,',','.') }}
									@endif
								</td>
								<td class="text-right">
									{{ number_format($balance,0,',','.') }}
								</td>
								<td class="text-center">
									{{ $transaction->user_id }}
								</td>
							</tr>

						@endforeach

					</tbody>
				</table>

			</div>
	  </div>
	</div>
@endsection