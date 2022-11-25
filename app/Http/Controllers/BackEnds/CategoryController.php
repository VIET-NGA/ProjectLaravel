<?php

namespace App\Http\Controllers\BackEnds;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    private $cate;
    public function __construct(Category $category){
        $this->cate = $category;
    }
    // check Auth
    // chú ý hàm send
    public function AuthLogin(){
        $admin_id = Session::get('adminId');
        if ($admin_id) {
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('admin')->send();
        }
    }


    public function index(){
        $this->AuthLogin();
        // $result = DB::table('tbl_category')->get()->toArray();
        $result = $this->cate::orderBy('category_id','DESC')->paginate(5);
        return view('BackEnds.partials.categories.category', compact('result'));
    }

    // get add
    public function addCategory(){
        $this->AuthLogin();
        return view('BackEnds.partials.categories.addCategory');
    }

    // post add
    public function postCategory(CategoryRequest $request){
        $this->AuthLogin();
        // $data=[];
        // $data['category_name'] = $request->categoryName;
        // $data['category_description'] = $request->descriptionName;
        // $data['category_status'] = $request->cateStatus;
        // $data['created_at'] = now();
        // $result = DB::table('tbl_category')->insert($data);
        // Session::put('message','Thêm Danh Mục Thành Công');

        // Chuyển sang sử dụng model
        $this->cate['category_name'] = $request->categoryName;
        $this->cate['category_description'] = $request->descriptionName;
        $this->cate['category_status'] = $request->cateStatus;
        $this->cate['created_at'] = now();
        // dd($this->cate);
        if (!empty($this->cate)) {
           $this->cate->save();
        }
        
        return redirect()->route('addCategory')->with('success','Thêm Danh Mục Thành Công');
    }

    // get edit category
    public function editCategory($id){
        $this->AuthLogin();
        // $data = DB::table('tbl_category')->where('category_id', $id)->first();
        $data = $this->cate::find($id);
        return view('BackEnds.Partials.categories.editCategory', compact('data'));
    }

    // post edit category
    public function posteditCategory(EditCategoryRequest $request, $id){
        $this->AuthLogin();
        // $data=[];
        // $data['category_name'] = $request->categoryName;
        // $data['category_description'] = $request->descriptionName;
        // $data['category_status'] = $request->cateStatus;
        // $data['updated_at'] = now()->format('Y-m-d H:i:s');

        // DB::table('tbl_category')->where('category_id', $id)->update($data);
        // Session::put('message','Cập nhật Danh Mục Thành Công');

        $data = $this->cate::find($id);
        // dd($data);

        $data['category_name'] = $request->categoryName;
        $data['category_description'] = $request->descriptionName;
        $data['category_status'] = $request->cateStatus;
        $data['updated_at'] = now()->format('Y-m-d H:i:s');
        
        // dd($data);
        $data->save();
        return redirect()->route('category')->with('success','Cập nhật Danh Mục Thành Công');
        
    }

    // delete category
    public function deleteCategory($id){
        $this->AuthLogin();
        // DB::table('tbl_category')->where('category_id', $id)->delete();
        // Session::put('message','Xóa Danh Mục Thành Công');
        $result = $this->cate::where('category_id', $id);
        if ($result) {
            $result->delete();
        }
        return redirect()->route('category')->with('success','Xóa Danh Mục Thành Công');
    }
}
