<?php

namespace App\Http\Controllers\BackEnds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class ProductController extends Controller
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
        $result = DB::table('tbl_product')
                    ->join('tbl_category','tbl_product.category_id', '=', 'tbl_category.category_id')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->select('tbl_product.*', 'tbl_category.category_name', 'tbl_brand.brand_name')
                    ->get()->toArray();
                    // dd($result);
        return view('BackEnds.partials.products.product', compact('result'));
    }

    // add
    public function addProduct(){
        $this->AuthLogin();
        $category = DB::table('tbl_category')->orderBy('category_id','DESC')->get();
        $brand = DB::table('tbl_brand')->orderBy('brand_id','DESC')->get();
        return view('BackEnds.partials.products.addProduct', compact('category','brand'));
    }

    public function saveProduct(Request $request){
        $this->AuthLogin();
        $data=[];
        $data['product_name']=$request->productName;
        $data['product_price']=$request->price;
        $data['product_description']=$request->descriptionName;
        $data['product_content']=$request->contentName;

        $data['category_id']=$request->categoryId;
        $data['brand_id']=$request->brandId;
        $data['product_status']=$request->statusName;
        $data['created_at']=now();

        // image
        $get_image = $request->file('imageName');
        if ($get_image) {
            // lấy tên file
            $fileName = $get_image->getClientOriginalName();

            // tách tên ra bởi dấu chấm, 
            //  - current: lấy tên trước dấu .
            $imageCur = current(explode('.', $fileName));

            // lấy file mở rộng: đuôi file: jpg, png......
            $imageEx = $get_image->getClientOriginalExtension();

            // tên ảnh mới
            $newImage = $imageCur . rand(0,99) . '.' . $imageEx;

            // Tạo đường dẫn
            $path = "uploads/products";

            // lưu ảnh vào bộ nhớ tạm
            $get_image->move($path, $newImage);

            // gán dữ liệu
            $data['product_image'] = $newImage;
            
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm Sản Phẩm Thành Công');
            return redirect()->route('product');
        }else{

            $data['product_image'] = "";
            
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm Sản Phẩm Thành Công');
            return redirect()->route('product');
        }
    }

    // edit
    public function editProduct($id){
        $this->AuthLogin();
        $category = DB::table('tbl_category')->orderBy('category_id','DESC')->get();
        $brand = DB::table('tbl_brand')->orderBy('brand_id','DESC')->get();

        $product = DB::table('tbl_product')->where('product_id', $id)->first();
        return view('BackEnds.partials.products.editProduct', compact('category','brand','product'));
    }

    public function updateProduct(Request $request, $id){
        $this->AuthLogin();
        try {
            $data=[];
            $data['product_name'] = $request->productName;
            $data['product_image'] = $request->imageName;
            $data['product_price'] = $request->price;
            $data['product_description'] = $request->descriptionName;
            $data['product_content'] = $request->contentName;
            $data['category_id'] = $request->categoryId;
            $data['brand_id'] = $request->brandId;
            $data['product_status'] = $request->statusName;
            $data['updated_at'] = now();
    
            // image
            $get_image = $request->file('imageName');
            if ($get_image) {
                $filename = $get_image->getClientOriginalName();
                $imageCur = current(explode('.', $filename));
                $imageEx = $get_image->getClientOriginalExtension();
                $newImage = $imageCur . rand(0,99). '.' . $imageEx;
    
                $path = 'uploads/products';
                $get_image->move($path, $newImage);
    
                $data['product_image']= $newImage;
                DB::table('tbl_product')->where('product_id',$id)->update($data);
                Session::put('message','Cập nhật sản phẩm thành công');
                
            }else{
                // $data['product_image']= '';
                DB::table('tbl_product')->where('product_id',$id)->update($data);
                Session::put('message','Cập nhật sản phẩm thành công');
            }
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
       
        return redirect()->route('product');
    }

    // delete
    public function deleteProduct($id){
        $this->AuthLogin();
        // $result = DB::table('tbl_product')->where('product_id', $id)->first();
        // $image_Path = "uploads/products/" . $result->product_image;
        // if (file_exists($image_Path)) {
        //     unlink($image_Path);
        // }
        // $result->delete();
        // Session::put('message','Xóa Sản Phẩm Thành Công');
        // return redirect()->route('product');

        $result = DB::table('tbl_product')->where('product_id',$id);

        $idImage = $result->first();
        $image_Path = "uploads/products/" . $idImage->product_image;

        if (file_exists($image_Path)) {
            unlink($image_Path);
        }
        $result->delete();
        Session::put('message','Xóa Sản Phẩm Thành Công');
        return redirect()->route('product');
    }
}
