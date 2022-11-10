<?php

namespace App\Http\Controllers\BackEnds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{

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
        // toArray để check Empty bên view
        $data = DB::table('tbl_brand')->get()->toArray();
        return view('BackEnds.Partials.brands.brand', compact('data'));
    }

    // add
    public function addBrand(){
        $this->AuthLogin();
        return view('BackEnds.Partials.brands.addBrand');
    }
    public function saveBrand(Request $request){
        $this->AuthLogin();
        $data=[];
        $data['brand_name'] = $request->brandName;
        $data['brand_description'] = $request->descriptionName;
        $data['brand_status'] = $request->statusName;
        $data['created_at'] = now();

        DB::table('tbl_brand')->insert($data);
        Session::put('message','Thêm Thương hiệu thành công');
        return redirect()->route('addBrand');

    }

    // edit
    public function editBrand($id){
        $this->AuthLogin();
        $result = DB::table('tbl_brand')->where('brand_id',$id)->first();
        return view('BackEnds.Partials.brands.editBrand', compact('result'));
    }

    public function updateBrand(Request $request, $id){
        $this->AuthLogin();
        $data = [];
        $data['brand_name'] = $request->brandName;
        $data['brand_description'] = $request->descriptionName;
        $data['brand_status'] = $request->statusName;
        $data['updated_at'] = now();

        DB::table('tbl_brand')->where('brand_id', $id)->update($data);
        Session::put('message','Cập nhật Thương hiệu thành công');
        return redirect()->route('brand');
    }


    // delete
    public function deleteBrand($id){
        $this->AuthLogin();
       $data = DB::table('tbl_brand')->where('brand_id', $id)->delete();
       Session::put('message','Xóa Thương Hiệu Thành Công');
       return redirect()->route('brand');
    }
}
