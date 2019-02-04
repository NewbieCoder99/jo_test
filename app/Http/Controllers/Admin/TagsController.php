<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
// use Yajra\DataTables\Html\Builder;
// use Validator;
use App\Tag;

class TagsController extends Controller
{

    public function __construct() {
        $this->template = env('PRIVATE_TEMPLATE', null);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(Tag::orDerBy('id','desc'))->toJson();
        }
        return view($this->template.'.admin.tags._index',[
            'name_page' => 'Articles || Tags',
            'title' => 'Dashboard - Articles | Tags'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->template.'.admin.tags._create',[
            'include' => $this->template.'.admin.tags._form'
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
        try
        {
            $request['slug'] = str_slug($request->name,'-');
            Tag::create($request->all());
            return ['error' => 0, 'msg' => 'Data berhasil disimpan!'];  

        } catch (\Exception $e)
        { 
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
        $data = Tag::find($id);
        $view = $this->template.'.admin.tags._details';

        if(Request()->query('mode') == 'del_confirmation') {
            $view = $this->template.'.admin.tags._delconf';
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
        $data = Tag::find($id);
        return view($this->template.'.admin.tags._edit',[
            'data' => $data,
            'include' => $this->template.'.admin.tags._form'
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
        try
        {
            $request['slug'] = str_slug($request->name,'-');
            $tag = Tag::find($id);
            $tag->update($request->all());
            return ['error' => 0,'msg' => 'Data berhasil diperbarui!'];

        } catch (\Exception $e)
        { 
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
            Tag::destroy($id);
            return ['error' => 0, 'msg' => 'Data berhasil dihapus!'];
        } catch (\Exception $e) {
            return ['error' => 1, 'msg' => [$e->getMessage()]];
        }
    }
}
