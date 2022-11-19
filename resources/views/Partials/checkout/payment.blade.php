@extends('layout')
@section('title_page','checkout')
@section('main')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div><!--/breadcrums-->
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
        <section id="do_action">
            <div class="container">
                <div class="">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <div class="total_area" style="margin-bottom: auto;">
                            <ul>
                                <li>Cộng Tiền hàng <span>{{ Cart::subtotal() }}</span></li>
                                <li>Tiền Thuế 10%<span>{{ Cart::tax() }}</span></li>
                                <li>Tiền Ship <span>Free</span></li>
                                <li>Tổng Cộng  <span>{{ Cart::total() }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br/>
        <div class="payment-options">
            <form action="{{ route('order-place') }}" method="post">
                @csrf
            <h3>Chọn hình thức thanh toán</h3>
                <span>
                    <label><input name="payment_option" value="0" type="checkbox"> Trả bẳng thẻ ATM</label>
                </span>
                <span>
                    <label><input name="payment_option" value="1" type="checkbox"> Nhận tiền mặt</label>
                </span>
                <button type="submit" class="btn btn-primary"> Đặt hàng</button>
            </form>
        </div>
    </div>
</section>
@endsection