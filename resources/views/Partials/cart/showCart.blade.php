@extends('layout')
@section('title_page','Giỏ hàng')
@section('main')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Giỏ hàng của bạn</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
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
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cộng Tiền Hàng <span>{{ Cart::subtotal() }}</span></li>
                        <li>Tiền Thuế 10%<span>{{ Cart::tax() }}</span></li>
                        <li>Tiền Ship <span>Free</span></li>
                        <li>Tổng Cộng Tiền Thanh Toán <span>{{ Cart::total() }}</span></li>
                    </ul>
                        {{-- <a class="btn btn-default update" href="">Update</a> --}}
                        <?php
                            $customer_id = Session::get('customer_id');
                        ?>
                        @if ($customer_id != null)
                            <a class="btn btn-default check_out" href="{{ route('checkout') }}">Thanh Toán</a>
                        @else
                            <a class="btn btn-default check_out" href="{{ route('loginCheckout') }}">Thanh Toán</a>
                        @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Mã giảm giá</label>
                        <input class="form-control" type="text" placeholder="Nhập mã giảm giá">
                        <button type="submit" class="btn btn-primary"> Áp mã giảm giá</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
    
@endsection