<?php

namespace App\Http\Controllers\BackEnds;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Http\Requests\EditCouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CouponController extends Controller
{

    private $coupon;
    public function __construct(Coupon $coupon){
        $this->coupon = $coupon;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon = $this->coupon::orderBy('name', 'desc')->paginate(5);
        return view('BackEnds.Partials.coupon.coupon', compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BackEnds.Partials.coupon.addCoupon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        $this->coupon['name'] = $request->couponName;
        $this->coupon['slug'] = Str::slug($request->couponName);
        $this->coupon['number'] = $request->couponNumber;
        $this->coupon['time'] = $request->couponTime;
        $this->coupon['code'] = $request->couponCode;
        $this->coupon['condition'] = $request->couponCondition;
        $this->coupon['created_at'] = now();

        if ($this->coupon) {
            $this->coupon->save();
            return redirect()->route('coupon.index')->with('success', 'Tạo mã giảm Thành công');
        }else{
            return redirect()->route('coupon.create')->withErrors('Tạo mã giảm thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->coupon::find($id);
        
        return view('BackEnds.Partials.coupon.editCoupon', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCouponRequest $request, $id)
    {
        $data = $this->coupon::find($id);
        $data['name'] = $request->couponName;
        $data['slug'] = Str::slug($request->couponName);
        $data['number'] = $request->couponNumber;
        $data['time'] = $request->couponTime;
        $data['code'] = $request->couponCode;
        $data['condition'] = $request->couponCondition;

        $data['updated_at'] = now();

        if ($data) {
            $data->save();
            return redirect()->route('coupon.index')->with('success', 'Cập Nhật Mã Giảm Thành Công');
        }else{
            return redirect()->route('coupon.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->coupon::find($id);
        if ($data) {
            $data->delete();
            return redirect()->route('coupon.index')->with('success','Xóa Mã Giảm Thành Thành Công');
        }else{
            return redirect()->route('coupon.index')->withErrors('Xóa Mã Giảm Thất Bại');
        }
    }
}
