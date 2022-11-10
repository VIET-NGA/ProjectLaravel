<?php

namespace App\Http\Controllers\BackEnds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
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
        return view('BackEnds.loginAdmin');
        // 
    }
    public function ShowDashboard(){
        $this->AuthLogin();
        return view('BackEnds.Partials.home.home');
    }

    // login
    public function adminDashboard(Request $request){
        $email = $request->admin_email;
        $pass = md5($request->admin_password);
        $result = DB::table('tbl_admin')->where(['admin_email'=>$email, 'admin_password'=>$pass])->first();
        if($result){
            Session::put('adminName',$result->admin_name);
            Session::put('adminId',$result->admin_id);
            return view('BackEnds.Partials.home.home');
        }else{
            Session::put('message','Thông tin đăng nhập không đúng');
           return redirect('admin');
        }
    }

    // logout
    public function logout(){
        $this->AuthLogin();
        Session::put('adminName',null);
        Session::put('adminId',null);
        return redirect('admin');
    }
}
