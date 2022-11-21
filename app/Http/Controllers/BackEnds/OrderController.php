<?php

namespace App\Http\Controllers\BackEnds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
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

        $orderInfor = DB::table('tbl_order')
                    ->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
                    ->orderBy('tbl_order.order_id','DESC')
                    ->get();
        
        // dd($orderInfor);
        return view('BackEnds.Partials.orders.list_order', compact('orderInfor'));
    }

    // show order
    Public function Show_Order($id){
        $this->AuthLogin();
        $orderData_Details = DB::table('tbl_order_details')
                            ->join('tbl_order', 'tbl_order.order_id', '=', 'tbl_order_details.order_id')
                            ->join('tbl_customer', 'tbl_customer.customer_id', '=', 'tbl_order.customer_id')
                            ->where('tbl_order_details.order_id', $id)
                            ->get();

        $shippingInfor = DB::table('tbl_shipping')
                        ->join('tbl_order','tbl_shipping.shipping_id','=','tbl_order.shipping_id')
                        ->where('tbl_shipping.shipping_id',$id)->first();

                // dd($shippingInfor);
        return view('BackEnds.Partials.orders.list_order_details_and_shipInfor',compact('orderData_Details','shippingInfor'));
    }

    public function Edit_Order($id){
        $this->AuthLogin();
        $orderData = DB::table('tbl_order')->where('order_id',$id)->first();
        // dd($orderData);

        return view('BackEnds.Partials.orders.edit_order', compact('orderData'));
    }
    public function Update_Order(Request $request, $id){
        $this->AuthLogin();
        $statusOrder['order_status'] = $request->orderStatus;
        // dd($statusOrder);
        DB::table('tbl_order')->where('order_id',$id)->update($statusOrder);
        Session::put('message', 'Cập nhật trạng thái đơn hàng thành công');
        return redirect()->route('order');
    }
}
