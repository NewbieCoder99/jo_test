<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\PostTag;
use App\PostCategory;
// use Yajra\DataTables\Html\Builder;
// use Validator;
use App\Post;

class PostsController extends Controller
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
            return DataTables::of(Post::with(['tags','category','author'])->orDerBy('id','desc')->get())
                ->toJson();
        }
        return view($this->template.'.admin.posts._index',[
            'name_page' => 'Articles || Posts',
            'title' => 'Dashboard - Articles | Posts'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->template.'.admin.posts._create', ['include' => $this->template.'.admin.posts._form']);
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
            $request['user_id'] = Auth::user()->id;
            $request['slug']    = str_slug(Request()->name,'-');
            $data = Post::create(Request()->all());
                $data->addCategory(Request()->category_id);
                $data->addTags(Request()->tag_id);
                $data->audits;
            return ['error' => 0, 'msg' => 'Data berhasil disimpan!'];
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
        $data = Post::with(['tags','category','author'])->findOrFail($id);
        $view = $this->template.'.admin.posts._details';

        if(Request()->query('mode') == 'del_confirmation') {
            $view = $this->template.'.admin.posts._delconf';
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
        $data = Post::with(['tags','category','author'])->findOrFail($id);
        return view($this->template.'.admin.posts._edit', [
            'include' => $this->template.'.admin.posts._form',
            'data' => $data
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

            $request['slug'] = str_slug($request->name,'-');
            $data = Post::find($id);
                $data->update($request->all());
            if(!is_null($request->tag_id)) {
                PostTag::where(['post_id' => $id])->delete();
                    $data->addTags(Request()->tag_id);
            }

            if(!empty($request->category_id)) {
                PostCategory::where(['post_id' => $id])->delete();
                    $data->addCategory(Request()->category_id);
            }

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
            $data = Post::find($id);
            $data->destroy($id);
            $data->audits;
            return ['error' => 0, 'msg' => 'Data berhasil dihapus!'];
        } catch (\Exception $e) {
            return ['error' => 1, 'msg' => [$e->getMessage()]];
        }
    }
}
