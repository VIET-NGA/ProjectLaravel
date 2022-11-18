<?php

namespace App\Http\Controllers\FrontEnds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // Trang Chủ
    public function index(){
        $danhmuc = DB::table('tbl_category')->where('category_status', '0')->orderBy('category_id','DESC')->get();
        $thuonghieu = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id','DESC')->get();
        $sanpham = DB::table('tbl_product')->where('product_status', '0')->orderBy('product_id','DESC')->get();
        return view('Partials.home.home', compact('danhmuc', 'thuonghieu', 'sanpham'));
    }

    public function DanhMucSanPham($id){
        $danhmuc = DB::table('tbl_category')->where('category_status', '0')->orderBy('category_id','DESC')->get();
        $thuonghieu = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id','DESC')->get();
        $data = DB::table('tbl_product')->where('category_id', $id)->get()->toArray();
        // $data = DB::table('tbl_product')
        //         ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')
        //         ->where('tbl_product.category_id', $id)
        //         ->select('tbl_product.*','tbl_category.category_name')
        //         ->get();

        // get tên Danh mục
        $category_name = DB::table('tbl_category')->where('category_id', $id)->get();

        return view('Partials.products.product_by_categoryID', compact('danhmuc', 'thuonghieu', 'data', 'category_name'));
    }

    public function ThuongHieuSanPham($id){
        $danhmuc = DB::table('tbl_category')->where('category_status', '0')->orderBy('category_id','DESC')->get();
        $thuonghieu = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id','DESC')->get();

        $brandByid = DB::table('tbl_product')->where('brand_id', $id)->get()->toArray();

        return view('Partials.products.product_by_brand_ID', compact('danhmuc', 'thuonghieu', 'brandByid'));
    }

    // ProductDetail
    public function ProductDetail($id){
        $danhmuc = DB::table('tbl_category')->where('category_status', '0')->orderBy('category_id','DESC')->get();
        $thuonghieu = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id','DESC')->get();

        // $result = DB::table('tbl_product')->where('product_id', $id)->first();
        $product_detail = DB::table('tbl_product')
                  ->join('tbl_category','tbl_product.category_id', '=', 'tbl_category.category_id')
                  ->join('tbl_brand','tbl_brand.brand_id', '=', 'tbl_product.brand_id')
                  ->where('tbl_product.product_id', $id)->first();
        // dd($product_detail);


        // Sản phẩm liên quan
        // lấy tất cả id danh mục cùng voi id chi tiết, 
        $category_id = DB::table('tbl_product')->where('category_id', $product_detail->category_id)->get();
        // dd($category_id);
        foreach ($category_id as $key => $value) {
            // lấy từng id danh mục gán vào biến $catId
            $catId = $value->category_id;
            // dd($catId);
        }
        // truy vấn all sản phẩm liên quan có cùng 1 danh mục và loại sản phẩm đang được chọn 
        $sanphamlienquan = DB::table('tbl_product')->where('category_id', $catId)->whereNotIn('product_id', [$id])->get();
        // dd($sanphamlienquan);
       
        return view('Partials.products.productDetail', compact('danhmuc', 'thuonghieu', 'product_detail', 'sanphamlienquan'));
    }

    // Search
    public function Search(Request $request){
        $danhmuc = DB::table('tbl_category')->where('category_status', '0')->orderBy('category_id','DESC')->get();
        $thuonghieu = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id','DESC')->get();
        
        $timkiem = $request->keywords;
        $querySearch = DB::table('tbl_product')->where('product_name', 'like','%' . $timkiem . '%')->get();

        return view('Partials.products.search', compact('danhmuc', 'thuonghieu', 'querySearch','timkiem'));
    }

    // Liên hệ
    public function contact(){
        return view('Partials.contact.contact');
    }

    // loginPage
    public function login(){
        return view('login');
    }
}
