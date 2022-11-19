@extends('BackEnds.layoutAdmin')
@section('titleAdminPage','Cập Nhật Đơn hàng')
    
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
                    <form action="{{ route('updateOrder', $orderData->order_id) }}" class="cmxform form-horizontal " id="signupForm" method="post" action="" novalidate="novalidate">
                        @csrf
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Trạng Thái Đơn Hàng</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="orderStatus" id="">
                                    <option value="Đang chờ xử lý" {{ $orderData->order_status == 'Đang chờ xử lý' ? 'selected' : '' }}>Đang chờ xử lý</option>
                                    <option value="Đang vận chuyển" {{ $orderData->order_status == 'Đang vận chuyển' ? 'selected' : '' }}>Đang vận chuyển</option>
                                    <option value="Hoàn thành" {{ $orderData->order_status == 'Hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                                    <option value="Hủy" {{ $orderData->order_status == 'Hủy' ? 'selected' : '' }}>Hủy</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Cập Nhật</button>
                                <a href=""><button class="btn btn-default" type="button">Quay lại</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection