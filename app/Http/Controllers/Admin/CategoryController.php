<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $appends = [
        'getParentTree'
    ];

    public static function getParentTree($category, $title)
    {
        if ($category->parent_id == 0) {
            return $title;
        }

        $parent = Category::find($category->parent_id);
        $title = $parent->title . ' > ' . $title;
        return CategoryController::getParentTree($parent, $title);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $dataList=Category::with('child')->get();

        //print_r($dataList);
        //exit();
        return view('admin.categories',['dataList'=>$dataList]);
    }

    public function add(){
        $dataList=Category::with('child')->get();;
        return view('admin.category_add',['dataList'=>$dataList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request  $request)
    {
        DB::table('categories')->insert([
            'parent_id' => $request->input('parent_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'keywords' => $request->input('keywords'),
            'slug' => $request->input('slug'),
            'status' => $request->input('status')
        ]);
        return redirect()->route('admin_category');
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category , $id)
    {
        $data=Category::find($id);
       // $data=DB::table('categories')->get()->where('id',$id);
        $dataList=Category::with('child')->get();;
        return view('admin.category_edit',['data'=>$data,'dataList' => $dataList]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category,$id)
    {
        $data = Category::find($id);

        $data->parent_id = $request->input('parent_id');
        $data->title = $request->input('title');
        $data->description =$request->input('description');
        $data->keywords = $request->input('keywords');
        $data->slug = $request->input('slug');
        $data->status =$request->input('status');

        $data->save();

        return redirect()->route('admin_category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category , $id)
    {
        DB::table('categories')->where('id','=',$id)->delete();
        return redirect()->route('admin_category');
    }
}
