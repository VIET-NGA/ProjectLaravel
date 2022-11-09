<?php

namespace App\Http\Controllers\BackEnds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index(){
        $result = DB::table('tbl_category')->get()->toArray();
        return view('BackEnds.partials.categories.category', compact('result'));
    }

    // get add
    public function addCategory(){
        return view('BackEnds.partials.categories.addCategory');
    }

    // post add
    public function postCategory(Request $request){
        $data=[];
        $data['category_name'] = $request->categoryName;
        $data['category_description'] = $request->descriptionName;
        $data['category_status'] = $request->cateStatus;
        $data['created_at'] = now();

        $result = DB::table('tbl_category')->insert($data);
        Session::put('message','Thêm Danh Mục Thành Công');
        return redirect()->route('addCategory');
    }

    // get edit category
    public function editCategory($id){
        $data = DB::table('tbl_category')->where('category_id', $id)->first();
        return view('BackEnds.Partials.categories.editCategory', compact('data'));
    }

    // post edit category
    public function posteditCategory(Request $request, $id){
        $data=[];
        $data['category_name'] = $request->categoryName;
        $data['category_description'] = $request->descriptionName;
        $data['category_status'] = $request->cateStatus;
        $data['updated_at'] = now()->format('Y-m-d H:i:s');

        DB::table('tbl_category')->where('category_id', $id)->update($data);
        Session::put('message','Cập nhật Danh Mục Thành Công');
        return redirect()->route('category');
    }

    // delete category
    public function deleteCategory($id){
        DB::table('tbl_category')->where('category_id', $id)->delete();
        Session::put('message','Xóa Danh Mục Thành Công');
        return redirect()->route('category');
    }
}
