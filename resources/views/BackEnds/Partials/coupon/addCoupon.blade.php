@extends('BackEnds.layoutAdmin')
@section('titleAdminPage','Thêm Mã Giảm')
    
@section('mainAdmin')
<div class="row">
    <div class="col-lg-12">
        @if (Session::has('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ Session::get('success') }}</strong>
        </div>
        @endif
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
                    <form action="{{ route('coupon.store') }}" class="cmxform form-horizontal" method="POST">
                        @csrf
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Tên Mã Giảm <span class="text-danger">(*)</span></label>
                            <div class="col-lg-6">
                                <input class="@error('couponName') is-invalid @enderror form-control" id="" name="couponName" value="{{ old('couponName') }}" type="text">
                                @error('couponName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group ">
                            <label class="control-label col-lg-3">Mã Giảm <span class="text-danger">(*)</span></label>
                            <div class="col-lg-6">
                                <input class="@error('couponCode') is-invalid @enderror form-control" id="" name="couponCode" value="{{ old('couponCode') }}" type="text">
                                @error('couponCode')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Số Lượng Mã Giảm<span class="text-danger">(*)</span></label>
                            <div class="col-lg-6">
                                <input class="@error('couponTime') is-invalid @enderror form-control" id="" name="couponTime" value="{{ old('couponTime') }}" type="number" min=0>
                                @error('couponTime')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Tính Năng Giảm</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="couponCondition">
                                    <option value="0">--- Chọn ---</option>
                                    <option value="1">Giảm Theo %</option>
                                    <option value="2">Giảm Theo Tiền</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Nhập Số % Hoặc Tiền Giảm<span class="text-danger">(*)</span></label>
                            <div class="col-lg-6">
                                <input class="@error('couponNumber') is-invalid @enderror form-control" id="" name="couponNumber" value="{{ old('couponNumber') }}" type="text">
                                @error('couponNumber')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Thêm</button>
                                <a href="{{ route('coupon.index') }}"><button class="btn btn-default" type="button">Quay lại</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection