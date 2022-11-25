<?php

namespace App\Http\Controllers\BackEnds;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class ProductController extends Controller
{
    private $pro;
    public function __construct(Product $product){
        $this->pro = $product;
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
        // $result = DB::table('tbl_product')
        //             ->join('tbl_category','tbl_product.category_id', '=', 'tbl_category.category_id')
        //             ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
        //             ->select('tbl_product.*', 'tbl_category.category_name', 'tbl_brand.brand_name')
        //             ->get()->toArray();
                    // dd($result);

        // chuyển sang Eloquent join từ bên view
        $result = $this->pro::orderBy('product_id', 'DESC')->paginate(5);

        return view('BackEnds.partials.products.product', compact('result'));
    }

    // add
    public function addProduct(){
        $this->AuthLogin();
        // $category = DB::table('tbl_category')->orderBy('category_id','DESC')->get();
        // $brand = DB::table('tbl_brand')->orderBy('brand_id','DESC')->get();

        // return view('BackEnds.partials.products.addProduct', compact('category','brand'));

        // chuyển sang share data $category và $brand từ AppServiceProvider
        return view('BackEnds.partials.products.addProduct');
    }

    public function saveProduct(ProductRequest $request){
        $this->AuthLogin();
        // $data=[];
        // $data['product_name']=$request->productName;
        // $data['product_price']=$request->price;
        // $data['product_description']=$request->descriptionName;
        // $data['product_content']=$request->contentName;

        // $data['category_id']=$request->categoryId;
        // $data['brand_id']=$request->brandId;
        // $data['product_status']=$request->statusName;
        // $data['created_at']=now();

        // $this->pro=[];
        $this->pro['product_name']=$request->productName;
        $this->pro['product_price']=$request->price;
        $this->pro['product_description']=$request->descriptionName;
        $this->pro['product_content']=$request->contentName;

        $this->pro['category_id']=$request->categoryId;
        $this->pro['brand_id']=$request->brandId;
        $this->pro['product_status']=$request->statusName;
        $this->pro['created_at']=now();

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
            // $data['product_image'] = $newImage;
            $this->pro['product_image'] = $newImage;
            
            // DB::table('tbl_product')->insert($data);
            // Session::put('message','Thêm Sản Phẩm Thành Công');
            // return redirect()->route('product');
        }else{

            $this->pro['product_image'] = "";
            
            // DB::table('tbl_product')->insert($data);
            // Session::put('message','Thêm Sản Phẩm Thành Công');
            // return redirect()->route('product');
        }
        if (!empty($this->pro)) {
            $this->pro->save();
            return redirect()->route('product')->with('success','Thêm Sản Phẩm Thành Công');
        }else{
            return redirect()->route('product')->withErrors('Thêm Sản Phẩm Thất bại');
        }
       
    }

    // edit
    public function editProduct($id){
        $this->AuthLogin();

        // chuyển sang share data $category và $brand từ AppServiceProvider
        // $category = DB::table('tbl_category')->orderBy('category_id','DESC')->get();
        // $brand = DB::table('tbl_brand')->orderBy('brand_id','DESC')->get();

        // $product = DB::table('tbl_product')->where('product_id', $id)->first();
        $product = $this->pro::find($id);
        
        return view('BackEnds.partials.products.editProduct', compact('product'));
    }

    public function updateProduct(EditProductRequest $request, $id){
        $this->AuthLogin();
        // $result = DB::table('tbl_product')->where('product_id',$id)->first();
        $result = $this->pro::find($id);
        // dd($result->product_image);
        
        // $getData = $result->first();
        // dd($result->product_image);

        // $result = $this->pro::where('product_id', $id)->first();
        // dd($result->product_image);
        try {
            // $data=[];
            // $data['product_name'] = $request->productName;
            // $data['product_image'] = $request->imageName;
            // $data['product_price'] = $request->price;
            // $data['product_description'] = $request->descriptionName;
            // $data['product_content'] = $request->contentName;
            // $data['category_id'] = $request->categoryId;
            // $data['brand_id'] = $request->brandId;
            // $data['product_status'] = $request->statusName;
            // $data['updated_at'] = now();

            $result['product_name'] = $request->productName;
            $result['product_price'] = $request->price;
            $result['product_description'] = $request->descriptionName;
            $result['product_content'] = $request->contentName;
            $result['category_id'] = $request->categoryId;
            $result['brand_id'] = $request->brandId;
            $result['product_status'] = $request->statusName;
            $result['updated_at'] = now();
    
            // dd($result);
            // image
                $get_image = $request->file('imageName');
                if ($get_image) {
                    echo "ok";
                    $filename = $get_image->getClientOriginalName();
                    $imageCur = current(explode('.', $filename));
                    $imageEx = $get_image->getClientOriginalExtension();
                    $newImage = $imageCur . rand(0,99). '.' . $imageEx;
        
                    $path = 'uploads/products';
                    $get_image->move($path, $newImage);
        
                    $result['product_image']= $newImage;
                    // $result->update($data);
                    // Session::put('message','Cập nhật sản phẩm thành công');
                    
                }
                else{
                    // nếu không chọn hình sẽ lấy hình cũ
                    // $data['product_image'] = $result->product_image;
                    $result['product_image'] = $result->product_image;
                    // $result->update($data);
                    // Session::put('message','Cập nhật sản phẩm thành công');
                 }
            $result->save();
            return redirect()->route('product')->with('success','Cập nhật sản phẩm thành công');
        } 
        catch (\Throwable $e) {
            return $e->getMessage();
        }
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

        $result = $this->pro::find($id);
        $image_Path = "uploads/products/" . $result->product_image;

        // vì gắn cờ cho xóa sản phẩm nên tạm ko xóa Ảnh
        // if (file_exists($image_Path)) {
        //     unlink($image_Path);
        // }

        $result->delete();
        // Session::put('message','Xóa Sản Phẩm Thành Công');
        return redirect()->route('product')->with('success','Xóa Sản Phẩm Thành Công');
    }
}
