<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Audit;

class AuditablesController extends Controller
{

  public function __construct() {
    $this->template = env('PRIVATE_TEMPLATE', null).'.admin.audits.';
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    if (request()->ajax()) {
      return DataTables::of(Audit::with('user')->orderBy('id','desc')->get())->toJson();
    }
    return view($this->template.'_index',[
      'name_page' => 'Administrations || Audits',
      'title' => 'Dashboard - Administrations | Audits'
    ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view($this->template.'_create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
  //
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    if(Request()->query('mode') == 'del_confirmation') {
        return view($this->template.'_delconf');
    }

    $view = $this->template.'_details';
    $data = Audit::with('user')->findOrFail($id);
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
    return view($this->template.'_edit');
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
  public function destroy(Request $request)
  {
    try {
        $data = Audit::truncate();
        Audit::create([
          'user_type' => 'App\Audit',
          'user_id' => Auth::user()->id,
          'event' => 'deleted',
          'auditable_type' => 'App\Destroy',
          'auditable_id' => 1,
          'old_values' => "[]",
          'new_values' => '{"audiatble" : "Deleted"}',
          'url' => url()->current(),
          'ip_address' => $request->server('REMOTE_ADDR'),
          'user_agent' => $request->server('HTTP_USER_AGENT')
        ]);
        return ['error' => 0, 'msg' => 'Data berhasil dihapus!'];
    } catch (\Exception $e) {
        return ['error' => 1, 'msg' => [$e->getMessage()]];
    }
  }
}
