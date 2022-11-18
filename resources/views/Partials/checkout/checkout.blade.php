@extends('layout')
@section('title_page','checkout')
@section('main')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->

        {{-- <div class="step-one">
            <h2 class="heading">Step1</h2>
        </div> --}}
        {{-- <div class="checkout-options">
            <h3>New User</h3>
            <p>Checkout options</p>
            <ul class="nav">
                <li>
                    <label><input type="checkbox"> Register Account</label>
                </li>
                <li>
                    <label><input type="checkbox"> Guest Checkout</label>
                </li>
                <li>
                    <a href=""><i class="fa fa-times"></i>Cancel</a>
                </li>
            </ul>
        </div><!--/checkout-options--> --}}

        <div class="register-req">
            <p>Form thông tin gửi hàng và ghi chú</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <form action="{{ route('save-shipping') }}" method="post">
                    @csrf
                <div class="col-sm-6 clearfix">
                    <div class="bill-to">
                        <p>Điền thông tin gửi hàng</p>
                        
                            <div class="form-group">
                                <label for="">Email:</label>
                                <input class="form-control" type="text" name="shipping_email" placeholder="Email*">
                            </div>
                            <div class="form-group">
                                <label for="">Họ tên:</label>
                                <input class="form-control" type="text" name="shipping_name" placeholder="Họ và tên *">
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ:</label>
                                <input class="form-control" type="text" name="shipping_address"e placeholder="Địa chỉ *">
                            </div>
                            <div class="form-group">
                                <label for="">Điện thoại:</label>
                                <input class="form-control" type="text" name="shipping_phone" placeholder="Phone *">
                            </div>
                            <div class="form-group">
                                
                                <button type="submit" class="btn btn-primary form-control">Gửi</button>
                            </div>
                        {{-- <input class="form-control" type="text" name="shipping_name" placeholder="Họ và tên *">
                        <input class="form-control" type="text" name="shipping_address"e placeholder="Địa chỉ *">
                        <input class="form-control" type="text" name="shipping_phone" placeholder="Phone *"> --}}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <p>Ghi chú gửi hàng</p>
                        <textarea class="form-control" name="shipping_note"  placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>
                        {{-- <label>
                            <input type="checkbox"> Ghi chú đơn hàng của bạn
                        </label> --}}
                    </div>	
                </div>
            </form>
            </div>
        </div>
        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>

        <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
            </div>
    </div>
</section>
@endsection