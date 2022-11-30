<?php

namespace App\Http\Controllers\FrontEnds;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function login_Checkout(){
        return view('partials.checkout.login_Checkout');
    }
    public function Save_login(Request $request){
        $email = $request->email;
        $pass = md5($request->password);
        $result = DB::table('tbl_customer')->where(['customer_email'=>$email, 'customer_password'=>$pass])->first();
        if ($result) {
            Session::put('customer_id', $result->customer_id);
            return redirect()->route('checkout');
        } else {
            Session::put('message', 'Thông tin đăng nhập không trùng khớp, vui lòng kiểm tra lại');
            return redirect()->route('loginCheckout');
        }
        
    }

    // logOut
    public function LogOut(){
        Session::put('customer_id',null);
        return redirect()->route('loginCheckout');
    }

    public function Save_Register(Request $request){
        $data=[];
        $data['customer_name'] = $request->username;
        $data['customer_email'] = $request->email;
        $data['customer_phone'] = $request->phone;
        $data['customer_password'] = md5($request->password);
        $data['created_at'] = now();

        $result = DB::table('tbl_customer'); 
        if ($data) {
           $insertGetId = $result->insertGetId($data);
            Session::put('message', 'Đăng ký tài khoản thành công');
            Session::put('customer_id', $insertGetId);
            Session::put('customer_name', $request->customer_name);
        }else{
            Session::put('message', 'Đăng ký tài khoản thất bại');
        }
        return redirect()->route('checkout');
    }

    public function checkout(){
        return view('Partials.checkout.checkout');
    }

    // public function Save_Shipping(Request $request){
    //     $data=[];
    //     $data['shipping_name'] = $request->shipping_name;
    //     $data['shipping_email'] = $request->shipping_email;
    //     $data['shipping_address'] = $request->shipping_address;
    //     $data['shipping_phone'] = $request->shipping_phone;
    //     $data['shipping_note'] = $request->shipping_note;
    //     $data['created_at'] = now();

    //     $InsertgetId_shipping = DB::table('tbl_shipping')->insertGetId($data);
    //     Session::put('shipping_id', $InsertgetId_shipping);
    //     return redirect()->route('payment');
    // }

    // public function Payment(){
    //     return view('Partials.checkout.payment');
    // }

    public function Order_place(Request $request){

        $dataMail = [];
        try {
           // save shipping
        $shipping=[];
        $shipping['shipping_name'] = $request->shipping_name;
        $shipping['shipping_email'] = $request->shipping_email;
        $shipping['shipping_address'] = $request->shipping_address;
        $shipping['shipping_phone'] = $request->shipping_phone;
        $shipping['shipping_note'] = $request->shipping_note;
        $shipping['created_at'] = now();

        $dataMail['khachhang'] = $shipping;

        $InsertgetId_shipping = DB::table('tbl_shipping')->insertGetId($shipping);

        
        Session::put('shipping_id', $InsertgetId_shipping);

        // get payment method
        $data = [];
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = "Đang chờ xử lý";
        $data['created_at'] = now();

        $dataMail['hinhthucthanhtoan'] = $data;

        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        // insert order
        $order_data = [];
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = "Đang chờ xử lý";
        $order_data['created_at'] = now();

        $dataMail['order'] = $order_data;

        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        // insert order details
        $content = Cart::content();
        // dd($content);
        foreach ($content as $key => $value) {
            $order_details =[];
            $order_details['order_id'] = $order_id;
            $order_details['product_id'] = $value->id;
            $order_details['product_name'] = $value->name;
            $order_details['product_price'] = $value->price; 
            $order_details['product_sales_quantity'] = $value->qty;
            $order_details['product_image'] = $value->options->image;

            $order_details['created_at'] = now();

            DB::table('tbl_order_details')->insert($order_details);

            $dataMail['order_detail'][] = $order_details;
        }

        // dd($dataMail);
            Mail::to($shipping['shipping_email'])->send(new SendMail($dataMail));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        
        // xóa giỏ hàng
        Cart::destroy();
        return view('Partials.checkout.thanks_order');
    }

    // public function SendMail(){
    //     $name = 'test send mail';
       
    //     Mail::send('Partials.Emails.thanksOrder', compact('name'), function($email){ 
    //         $email->to('vietnga@tanthanhthinh.com', 'Viet Nga');
    //     });
    // }
}
