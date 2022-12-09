@extends('BackEnds.layoutAdmin')
@section('titleAdminPage','Sửa Mã Giảm')
    
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
                    <form action="{{ route('coupon.update', $data->id) }}" class="cmxform form-horizontal" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Tên Mã Giảm <span class="text-danger">(*)</span></label>
                            <div class="col-lg-6">
                                <input class="@error('couponName') is-invalid @enderror form-control" id="" name="couponName" value="{{ $data->name }}" type="text">
                                @error('couponName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group ">
                            <label class="control-label col-lg-3">Mã Giảm <span class="text-danger">(*)</span></label>
                            <div class="col-lg-6">
                                <input class="@error('couponCode') is-invalid @enderror form-control" id="" name="couponCode" value="{{ $data->code }}" type="text">
                                @error('couponCode')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Số Lượng Mã Giảm<span class="text-danger">(*)</span></label>
                            <div class="col-lg-6">
                                <input class="@error('couponTime') is-invalid @enderror form-control" id="" name="couponTime" value="{{ $data->time }}" type="number" min=0>
                                @error('couponTime')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Tính Năng Giảm</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="couponCondition">
                                    @if ($data->condition==1)
                                        <option value="0">--- Chọn ---</option>
                                        <option value="1" selected>Giảm Theo %</option>
                                        <option value="2">Giảm Theo Tiền</option>
                                    @else
                                        <option value="0">--- Chọn ---</option>
                                        <option value="1">Giảm Theo %</option>
                                        <option value="2" selected>Giảm Theo Tiền</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Nhập Số % Hoặc Tiền Giảm<span class="text-danger">(*)</span></label>
                            <div class="col-lg-6">
                                <input class="@error('couponNumber') is-invalid @enderror form-control" id="" name="couponNumber" value="{{ $data->number }}" type="text">
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