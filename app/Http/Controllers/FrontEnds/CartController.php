<?php

namespace App\Http\Controllers\FrontEnds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function showCart(){
        return view('Partials.cart.showcart');
    }

    // save Cart
    public function saveCart(Request $request){

        $qty = $request->qty;
        $productId = $request->productId;

        $productInfor = DB::table('tbl_product')->where('product_id',  $productId)->first();
        // dd($productInfor);
        $data['id'] = $productInfor->product_id;
        $data['name'] = $productInfor->product_name;
        $data['qty'] = $qty;
        $data['price'] = $productInfor->product_price;
        $data['weight'] = 1000;
        $data['options']['image'] = $productInfor->product_image;
        // dd($data);
        // Cart::destroy();

        Cart::add($data);

        return view('Partials.cart.showCart');
    }

    // updateCart
    public function updateCart(Request $request, $rowId){
        $qty = $request->quantity;
        Cart::update($rowId,$qty);
        Session::put('message', 'Cập nhật  giỏ hàng thành công');
        return redirect()->route('showCart');
    }

    // delete cart
    public function deleteCart($rowId){
        Cart::remove($rowId);
        Session::put('message', 'Xóa sản phẩm trong giỏ hàng thành công');
        return redirect()->route('showCart');
    }
}
