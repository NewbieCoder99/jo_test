<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use Validator;
use App\Role;

class RolesController extends Controller
{

  public function __construct() {
    $this->template = env('PRIVATE_TEMPLATE', null).'.admin.roles';
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    if (request()->ajax()) {
      return DataTables::of(Role::all())->toJson();
    }
    return view($this->template.'._index',[
      'name_page' => 'Administrations || Roles',
      'title' => 'Dashboard - Administrations | Roles'
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
      Role::create(Request()->all());
      return ['error' => 0, 'msg' => 'Data is saved!'];
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
  public function show(Request $request, $id)
  {
      $data = Role::find($id);
      $view = $this->template.'._details';
      if(Request()->query('mode') == 'del_confirmation') {
        $view = $this->template.'._delconf';
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
      $data = Role::find($id);
      return view($this->template.'._edit', [
        'data' => $data,
        'include' => $this->template.'._form'
      ]);
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
    try {
      $role = Role::find($id);
      $role->update(Request()->all());
      return ['error' => 0,'msg'=>'Data is updated!'];
    } catch (\Exception $e) {
      return ['error' => 1, 'msg' => [$e->getMessage()]]; 
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try {
      Role::destroy($id);
      return ['error' => 0, 'msg' => 'Data is deleted!'];
    } catch (\Exception $e) {
      return ['error' => 1, 'msg' => [$e->getMessage()]];
    }
  }
}
