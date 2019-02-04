<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Transaction,Wallet,Vault};

class MutationController extends Controller
{

	private function interestCalculate($id)
	{
		$endDate = date('Y-m-t', strtotime(date("Y-m-d")));
		$transactions = Transaction::select([
			'users.id as userId',
			'users.name as user_name',
			'transactions.*',
			'clients.id as clientId',
			'clients.first_name',
			'clients.middle_name',
			'clients.last_name',
		])->join(
			'users',
			'transactions.user_id','=',
			'users.id'
		)->join(
			'clients',
			'transactions.client_id','=',
			'clients.id'
		)->orderBy('id', 'asc')
		->where('transactions.client_id', $id)
		->whereBetween('transactions.created_at', [date('Y-m-01'), $endDate])
		->get();

		$balance = 0;
		$min = [];

		foreach ($transactions as $key => $transaction) {
			// Saldo + Debit
			if($transaction->client_transaction_type_id == 1) {
				$balance = $balance + $transaction->amount;
			}

			// Saldo - Kredit
			if($transaction->client_transaction_type_id == 2) {
				$balance = $balance - $transaction->amount;
			}
			$min[] = $balance;
		}

		if(date('d') == date('t')) {
			$interestTotal = 0.5 * min($min) / 100;

			$transaction = Transaction::where('client_id', $id)
				->whereBetween('created_at', [$endDate,$endDate])->get();

			if(!$transaction) {

				$transaction = new Transaction();
				$transaction->user_id = \Auth::user()->id;
				$transaction->client_id = $id;
				$transaction->client_transaction_type_id = 3;
				$transaction->user_transaction_type_id = 2;
				$transaction->client_transaction_description = 'Bunga simpanan sukarela';
				$transaction->user_transaction_description = 'Pemberian bunga ke nasabah';
				$transaction->amount = $interestTotal;
				$transaction->created_at = date('Y-m-t h:i:s');
				$transaction->save();

				$wallet = Wallet::where('client_id', $id)->frist();
				$kurangi = $wallet->balance + $interest;
				$wallet->update(['balance' => $interest]);

				$vault = Vault::find(1)->first();
				$kurang = $vault->balance - $interest;
				$vault->update(['balance' => $interest]);
			}
		}
		return $transactions;
	}

	public function index($id)
	{
		$this->interestCalculate($id);
		$data['transactions'] = $this->interestCalculate($id);
		$data['title'] = 'Data Mutasi';
		$data['name_page'] = $data['title'];
		return view('webadmin.admin.mutations.index', $data);
	}

}
