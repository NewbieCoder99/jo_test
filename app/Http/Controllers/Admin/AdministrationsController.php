<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Validator;
use App\User;
use App\Role;
use App\UserRole;

class AdministrationsController extends Controller
{
    public function __construct() {
        $this->template = env('PRIVATE_TEMPLATE', null).'.admin.administrations';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            // return DataTables::of(User::query())->toJson();
            return DataTables::of(User::with('roles')->orderBy('id','desc')->get())->toJson();
        }
        return view($this->template.'._index',[
            'name_page' => 'Administrations || Users',
            'title' => 'Dashboard - Administrations | Users'
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
        $valid = Validator::make($request->all(), $this->rules(), $this->messages());
        if(!$valid->fails())
        {
            try
            {
                $data = User::create([
                    'email' => $request->email,
                    'name' => $request->name,
                    'password' => bcrypt($request->password),
                ]);
                $getRole = Role::find($request->role_id);
                $data->putRole($getRole->name);
                $data->audits;
                return ['error' => 0, 'msg' => 'Data berhasil disimpan!'];
            } catch (\Exception $e)
            { 
                return ['error' => 1, 'msg' => [$e->getMessage()]];  
            }
        }
        return ['error' => 1,'msg' => $valid->errors()->all()];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data = User::with('roles')->findOrFail($id);
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
        $data = User::with('roles')->findOrFail($id);
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
            $data = User::find($id);

            $param = [
                'email' => $request->email,
                'name' => $request->name
            ];

            if(!empty($request->role_id)) {
                $data->roles()->updateExistingPivot($id, [
                    'role_id' => $request->role_id
                ]);
            }

            if(!empty($request->password)) {
                $param = [
                    'email' => $request->email,
                    'name' => $request->name,
                    'password' => bcrypt($request->password),
                ];
            }

            $data->update($param);
            $data->audits;

            return ['error' => 0,'msg' => 'Data berhasil diperbarui!'];

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
            $data = User::find($id);
            $data->destroy($id);
            $data->audits;
            return ['error' => 0, 'msg' => 'Data berhasil dihapus!'];
        } catch (\Exception $e) {
            return ['error' => 1, 'msg' => [$e->getMessage()]];
        }
    }

    private function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required',
            'password_confirmation' => 'same:password',
            'role_id' => 'required|numeric'
        ];
    }

    private function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.unique' => 'Email sudah tersedia.',
            'email.email' => 'Format email salah.',
            'password.required' => 'Password harus di isi.',
            'password_confirmation.same' => 'Password konfirmasi tidak sama.',
            'role_id.required' => 'Level akses user tidak boleh kosong.',
            'role_id.numeric' => 'Level akses user hanya angka saja.'
        ];
    }
}
