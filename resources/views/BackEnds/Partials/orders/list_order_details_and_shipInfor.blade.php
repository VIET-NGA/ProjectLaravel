@extends('BackEnds.layoutAdmin')
@section('titleAdminPage','Danh Sách Chi Tiết Đơn Hàng Và Thông Tin Vận Chuyển')
@section('mainAdmin')
<div class="table-agile-info">
    <?php $messages = Session::get('message');
    if ($messages) {
        echo '<div class="alert alert-success" role="alert">';
            echo $messages;
            Session::put('message',null);
        echo '</div>';
    }

    ?>
    
    {{-- <div class="text-right" style="margin-bottom: 5px">
        <a href="#" title="Danh Sách Chi Tiết Đơn Hàng Và Thông Tin Vận Chuyển">
            <span class="btn btn-success" value="add">
                <i class="fa fa-plus"></i>
            </span>
        </a>
    </div> --}}
    <div class="panel panel-default">
      <div class="panel-heading">
        @yield('titleAdminPage')
      </div>
      {{-- @if (!empty($result)) --}}
      <div class="row w3-res-tb">
        <div class="col-sm-9">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <div>
        <h4>Danh sách chi tiết đơn hàng</h4>
    </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">STT</th>
              <th>Hình Ảnh</th>
              <th>Tên Sản Phẩm</th>
              <th>Số Lượng</th>
              <th>Đơn Giá</th>
              <th>Thành Tiền</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
               @foreach ($orderData_Details as $key => $item)
                  <tr>
                    <td>{{ $key }}</td>
                    <td>
                      <img src="{{ asset('uploads/products/' . $item->product_image) }}" alt="" height="auto" width="150px">
                    </td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->product_sales_quantity }}</td>
                    <td>{{ number_format($item->product_price)  }}</td>
                    <td>{{ number_format($item->product_price * $item->product_sales_quantity) }}</td>
                  </tr>
                @endforeach
          </tbody>
        </table>
      </div>
      <hr/><br/>
{{--  --}}
      <hr/><br/>
      <div>
          <h4>Thông tin và địa chỉ giao hàng</h4>
      </div>
      <div class="table-responsive">
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th>Tên Người Nhận</th>
                <th>Email người nhận</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Ghi chú</th>
              </tr>
            </thead>
            <tbody>
                  {{-- @foreach ($shippingInfor as $key => $shipping) --}}
                      <tr>
                          <td>{{ $shippingInfor->shipping_name }}</td>
                          <td>{{ $shippingInfor->shipping_email }}</td>
                          <td>{{ $shippingInfor->shipping_address }}</td>
                          <td>{{ $shippingInfor->shipping_phone }}</td>
                          <td>{{ $shippingInfor->shipping_note }}</td>
                      </tr>
                  {{-- @endforeach --}}
            </tbody>
          </table>
      </div>

      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
      {{-- @else --}}
      {{-- <div class="alert-warning" style="margin-top: 15px; text-align: center; font-size:17px">Danh Sách Sản Phẩm Trống</div> --}}
      {{-- @endif --}}
      
    </div>
  </div>
  
@endsection