@extends('BackEnds.layoutAdmin')
@section('titleAdminPage','Thêm Sản Phẩm')
    
@section('mainAdmin')
<div class="row">
    <div class="col-lg-12">
        <?php $messages = Session::get('message');
            if ($messages) {
                echo '<div class="alert alert-success" role="alert">';
                    echo $messages;
                    Session::put('message',null);
                echo '</div>';
            }
        ?>
        <section class="panel">
            <header class="panel-heading">
                @yield('titleAdminPage')
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-cog" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                 </span>
            </header>
            <div class="panel-body">
                <div class="form">
                    <form action="{{ route('updateProduct', $product->product_id) }}" class="cmxform form-horizontal" enctype="multipart/form-data" id="signupForm" method="post" novalidate="novalidate">
                        @csrf
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Tên Sản Phẩm</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="cate" name="productName" value="{{ $product->product_name }}" type="text">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Hình Ảnh</label>
                            <div class="col-lg-6">
                                <input class=" form-control" type="file" name="imageName" id="">
                                <img src="{{ asset('uploads/products/'. $product->product_image) }}" width="100px" height="auto" alt="">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Đơn Giá</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="cate" value="{{ $product->product_price }}" name="price" min="0" type="number">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Mô tả </label>
                            <div class="col-lg-6">
                                <textarea style="resize: none" rows="8" name="descriptionName" class="form-control" >{{ $product->product_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Nội Dung </label>
                            <div class="col-lg-6">
                                <textarea style="resize: none" rows="8" name="contentName" class="form-control" >{{ $product->product_content }}</textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Danh Mục</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="categoryId" id="">
                                    <option value="0">--- Danh Mục ---</option>
                                    @foreach ($category as $key=>$cat)
                                        @if ($cat->category_id==$product->category_id)
                                            <option selected value="{{ $cat->category_id }}">{{ $cat->category_name }}</option>
                                        @else
                                            <option value="{{ $cat->category_id }}">{{ $cat->category_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Thương Hiệu</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="brandId" id="">
                                    <option value="0">--- Thương Hiệu ---</option>
                                    @foreach ($brand as $key=>$brand)
                                        @if ($brand->brand_id==$product->brand_id)
                                            <option selected value="{{ $brand->brand_id }}" >{{ $brand->brand_name }}</option>
                                        @else
                                            <option value="{{ $brand->brand_id }}" >{{ $brand->brand_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Hiện thị</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="statusName" id="">
                                    @if ($product->product_status==0)
                                        <option selected value="0">Hiện</option>
                                        <option value="1">Ẩn</option>
                                    @else
                                        <option value="0">Hiện</option>
                                        <option selected value="1">Ẩn</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Cập nhật</button>
                               <a href="{{ route('product') }}"> <button class="btn btn-default" type="button">Quay lại</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    
</script>
@endsection