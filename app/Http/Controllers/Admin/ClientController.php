<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\{
  Client,
  Wallet,
  Transaction,
  Vault,
};

class ClientController extends Controller
{

  public function __construct()
  {
    $this->template = env('PRIVATE_TEMPLATE').'.admin.clients.';
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    if (request()->ajax()) {

      $data = Client::select([
        'clients.*',
        'wallets.id as wallet_id',
        'wallets.balance',
        'wallets.previous_balance'
      ])->join(
        'wallets',
        'clients.id','=',
        'wallets.client_id'
      )->orderBy('clients.id','desc')->get();

      return DataTables::of($data)->toJson();
    }
    return view($this->template.'_index',[
      'name_page' => 'Master Data || Clients',
      'title' => 'Dashboard - Master Data | Clients'
    ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view($this->template.'._create',[
      'include' => $this->template.'._form'
    ]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    try {

      $client = Client::create([
        'first_name' => $request->first_name,
        'middle_name' => $request->middle_name,
        'last_name' => $request->last_name,
        'gender' => $request->gender,
        'date_of_birth' => $request->date_of_birth,
        'job' => $request->job,
        'address' => $request->address,
        'city' => $request->city,
        'phone' => $request->phone
      ]);

      $client->audits;

      $wallet = Wallet::create([
        'client_id' => $client->id,
        'saving_id' => $request->saving_id
      ]);

      $wallet->audits;

      return ['error' => 0, 'msg' => 'Data is saved.'];

    } catch (\Exception $e) {
      return ['error' => 1, 'msg' => [$e->getMessage()]]; 
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {

    $data = Client::find($id);

    if(Request()->query('mode') == 'del_confirmation') {
      $view = $this->template.'_delconf';
    }

    if(Request()->query('mode') == 'del_confirmation') {
      $view = $this->template.'_details';
    }

    if(Request()->query('mode') == 'trx') {
      $view = $this->template.'_transaction';
    }

    return view($view, ['data' => $data]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
  //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
  //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
  //
  }

  public function addTransactions(Request $request)
  {

    try {
      $wallet = Wallet::where('client_id', $request->client_id)->first();
      $vault = Vault::find(1);

      $previousBalanceClient = $wallet->balance;
      $previousBalanceVault = $vault->balance;

      if($request->client_transaction_type_id == 1) {

        $balanceClient = $wallet->balance + $request->amount;
        $balanceVault = $vault->balance + $request->amount;
        $msg = 'Deposit is successfull.';
        $user_transaction_type_id = 2;
        $client_transaction_description = 'Setor Tunai';
        $user_transaction_description = 'Penerimaan penyetoran simpanan';

      } else if($request->client_transaction_type_id == 2) {

        if($wallet->balance < $request->amount) {
          return [
            'error' => 1,
            'msg' => ['Balance is insufficient.']
          ];
        }

        if($vault->balance < $request->amount) {
          return [
            'error' => 1,
            'msg' => ['Vault is insufficient.']
          ];
        }

        $balanceClient = $wallet->balance - $request->amount;
        $balanceVault = $vault->balance - $request->amount;
        $msg = 'Withdraw is successfull.';
        $user_transaction_type_id = 1;
        $client_transaction_description = 'Tarik Tunai';
        $user_transaction_description = 'Penarikan tabungan';
      }

      $wallet->update([
        'previous_balance' => $previousBalanceClient,
        'balance' => $balanceClient
      ]);

      $vault->update([
        'previous_balance' => $previousBalanceVault,
        'balance' => $balanceVault
      ]);

      $transaction = Transaction::create([
        'user_id' => \Auth::user()->id,
        'client_id' => $request->client_id,
        'client_transaction_type_id' => $request->client_transaction_type_id,
        'user_transaction_type_id' => $user_transaction_type_id,
        'client_transaction_description' => $client_transaction_description,
        'user_transaction_description' => $user_transaction_description,
        'amount' => $request->amount
      ]);

      return [
        'error' => 0,
        'msg' => [$msg]
      ];

    } catch (\Exception $e) {
      return [
        'error' => 1,
        'msg' => [$e->getMessage()]
      ];
    }

  }

}
