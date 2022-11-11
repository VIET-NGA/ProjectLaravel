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

    // Liên hệ
    public function contact(){
        return view('Partials.contact.contact');
    }

    // loginPage
    public function login(){
        return view('login');
    }
}
