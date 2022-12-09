<?php

namespace App\Http\Controllers\BackEnds;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    // chuyển sang models
    private $brand;
    public function __construct(Brand $brand){
        $this->brand = $brand;
        // $this->middleware('auth');
    }

    // check Auth
    // chú ý hàm send
    // public function AuthLogin(){
    //     $admin_id = Session::get('adminId');
    //     if ($admin_id) {
    //         return redirect()->route('dashboard');
    //     }else{
    //         return redirect()->route('admin')->send();
    //     }
    // }

    public function index(){
        // $this->AuthLogin();
        // toArray để check Empty bên view
        // $data = DB::table('tbl_brand')->get()->toArray();

        $data = $this->brand::orderBy('brand_id','DESC')->paginate(5);
        // dd($data);
        return view('BackEnds.Partials.brands.brand', compact('data'));
    }

    // add
    public function addBrand(){
        // $this->AuthLogin();
        return view('BackEnds.Partials.brands.addBrand');
    }
    public function saveBrand(BrandRequest $request){
        // $this->AuthLogin();
        // $data=[];
        // $data['brand_name'] = $request->brandName;
        // $data['brand_description'] = $request->descriptionName;
        // $data['brand_status'] = $request->statusName;
        // $data['created_at'] = now();

        // DB::table('tbl_brand')->insert($data);
        // Session::put('message','Thêm Thương hiệu thành công');

        $this->brand['brand_name'] = $request->brandName;
        $this->brand['brand_description'] = $request->descriptionName;
        $this->brand['brand_status'] = $request->statusName;
        $this->brand['created_at'] = now();

        if ($this->brand) {
           $this->brand->save();
        }

        return redirect()->route('addBrand')->with('success', 'Thêm Thương hiệu thành công');

    }

    // edit
    public function editBrand($id){
        // $this->AuthLogin();
        // $result = DB::table('tbl_brand')->where('brand_id',$id)->first();
        $result = $this->brand::find($id);
        return view('BackEnds.Partials.brands.editBrand', compact('result'));
    }

    public function updateBrand(Request $request, $id){
        // $this->AuthLogin();
        // $data = [];
        // $data['brand_name'] = $request->brandName;
        // $data['brand_description'] = $request->descriptionName;
        // $data['brand_status'] = $request->statusName;
        // $data['updated_at'] = now();

        // DB::table('tbl_brand')->where('brand_id', $id)->update($data);
        // Session::put('message','Cập nhật Thương hiệu thành công');
        $result = $this->brand::find($id);

        $result['brand_name'] = $request->brandName;
        $result['brand_description'] = $request->descriptionName;
        $result['brand_status'] = $request->statusName;
        $result['updated_at'] = now();

        if (!empty($result)) {
            $result->save();
            return redirect()->route('brand')->with('success', 'Cập nhật Thương hiệu thành công');
        }
        else{
            return redirect()->route('brand')->withErrors('Cập nhật Thương hiệu thất bại');
        }

        
    }


    // delete
    public function deleteBrand($id){
        // $this->AuthLogin();
    //    $data = DB::table('tbl_brand')->where('brand_id', $id)->delete();
    //    Session::put('message','Xóa Thương Hiệu Thành Công');

    $result = $this->brand::find($id);
   
        if ($result) {
            $result->delete();
        }
       return redirect()->route('brand')->with('success','Xóa Thương Hiệu Thành Công');
    }
}
