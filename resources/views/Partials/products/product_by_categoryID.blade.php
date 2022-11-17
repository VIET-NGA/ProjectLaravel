@extends('layout')
@section('title_page','Danh Mục Sản Phẩm')
@section('slide')
    @include('partials.slide.slide')
@endsection
@section('main')
<div class="row">
    @include('sidebar')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            @foreach ($category_name as $cat_name)
                <h2 class="title text-center">{{ $cat_name->category_name }}</h2>
            @endforeach
            
            @if ($data)
            @foreach ($data as $item)
            <a href="{{ route('chi-tiet-san-pham', $item->product_id) }}">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('uploads/products/' . $item->product_image)}}" alt="" />
                                    <h2>{{ number_format($item->product_price) }}</h2>
                                    <p>{{ $item->product_name }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                            </ul>
                        </div>
                    </div>
                </div></a>
            
            @endforeach
            @else
                <p class="alert alert-warning text-center">Sản Phẩm đang được cập nhật, vui lòng quay lại sau.....</p>
            @endif
            
        </div>
    </div>
</div>
@endsection