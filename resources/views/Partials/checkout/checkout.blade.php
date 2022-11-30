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
                {{-- <form action="{{ route('save-shipping') }}" method="post"> --}}
                <form action="{{ route('order-place') }}" method="post">
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
                                <label for="">Ghi chú gửi hàng:</label>
                                <textarea class="form-control" name="shipping_note"  placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea>
                            </div>
                            {{-- <div class="form-group">
                                
                                <button type="submit" class="btn btn-primary form-control">Gửi</button>
                            </div> --}}
                        {{-- <input class="form-control" type="text" name="shipping_name" placeholder="Họ và tên *">
                        <input class="form-control" type="text" name="shipping_address"e placeholder="Địa chỉ *">
                        <input class="form-control" type="text" name="shipping_phone" placeholder="Phone *"> --}}
                    </div>
                </div>
                <div class="col-sm-6">
                    {{-- <div class="form-group">
                        <p>Ghi chú gửi hàng</p>
                        <textarea class="form-control" name="shipping_note"  placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>
                    </div> --}}
                    <div class="review-payment">
                        <h2>Xem lại giỏ hàng</h2>
                    </div>
                    <div class="table-responsive cart_info" style="margin-bottom: -1px">
                        <?php 
                            $content = Cart::content();
                            $messages = Session::get('message');
                            if ($messages) {
                                echo '<div class="alert alert-success" role="alert">';
                                    echo $messages;
                                    Session::put('message',null);
                                echo '</div>';
                            }
                        ?>
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu">
                                    <td class="image">Hình Ảnh</td>
                                    <td class="description" style="width:520px">Tên Sản Phẩm</td>
                                    <td class="price">Đơn Giá</td>
                                    <td class="quantity">Số Lượng</td>
                                    <td class="total">Tổng Tiền</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($content as $item)
                                <tr>
                                    <td class="">
                                       <img src="{{ asset('uploads/products/' . $item->options->image) }}" alt="" height="auto" width="150px">
                                    </td>
                                    <td class="">
                                        <h4><a href="">{{ $item->name }}</a></h4>
                                        <p>Web ID: {{ $item->id }}</p>
                                    </td>
                                    <td class="">
                                        <p>{{ number_format($item->price) }}</p>
                                    </td>
                                    <form action="{{ route('updateCart', $item->rowId) }}" method="get">
                                        @csrf
                                        <td class="">
                                            <div class="">
                                                <input type="number" name="quantity" min="1" max="" value="{{ $item->qty }}" autocomplete="off" size="2">
                                                <button type="submit">Cập nhật</button>
                                            </div>
                                        </td>
                                    </form>
                                    <td class="">
                                        <p class="">{{ number_format($item->qty * $item->price) }}</p>
                                    </td>
                                    <td class="">
                                        <a class="" href="{{ route('deleteCart', $item->rowId) }}" onclick="return confirm('Bạn chắc muốn xóa sản phẩm ?')"placeholder="xóa"><i class="fa fa-times" ></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h3>Chọn hình thức thanh toán</h3>
                <span>
                    <label><input name="payment_option" value="0" type="checkbox"> Trả bẳng thẻ ATM</label>
                </span>
                <span>
                    <label><input name="payment_option" value="1" type="checkbox"> Nhận tiền mặt</label>
                </span>
                <button type="submit" class="btn btn-primary"> Đặt hàng</button>
                </div>
                </form>
            </div>
        </div>
        {{-- <div class="review-payment">
            <h2>Phương thức thanh toán</h2>
        </div>

        <div class="payment-options">
            <h3>Chọn hình thức thanh toán</h3>
            <span>
                <label><input name="payment_option" value="0" type="checkbox"> Trả bẳng thẻ ATM</label>
            </span>
            <span>
                <label><input name="payment_option" value="1" type="checkbox"> Nhận tiền mặt</label>
            </span>
            <button type="submit" class="btn btn-primary"> Đặt hàng</button>
            </div> --}}
    </div>
</section>
@endsection