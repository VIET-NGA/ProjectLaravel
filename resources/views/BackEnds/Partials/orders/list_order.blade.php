@extends('BackEnds.layoutAdmin')
@section('titleAdminPage','Danh Sách Đơn Hàng')
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
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Họ Tên Người Đặt</th>
              <th>Tổng Giá Tiền</th>
              <th>Tình Trạng</th>
              <th>Số Điện Thoại</th>
              <th>Email</th>
              <th>Ngày Đặt</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
                @foreach ($orderInfor as $key => $item)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $item->customer_name }}</td>
                        <td>{{ $item->order_total }}</td>
                        <td>
                          @switch($item->order_status)
                              @case($item->order_status == 'Đang chờ xử lý')
                                  <span style="background-color: blue; padding: 5px; color: white;">Đang chờ xử lý</span>
                                  @break
                              @case($item->order_status == 'Đang vận chuyển')
                                <span style="background-color: orange; padding: 5px; color: white;">Đang vận chuyển</span>
                                @break
                              @case($item->order_status == 'Hoàn thành')
                                <span style="background-color: green; padding: 5px; color: white;">Hoàn thành</span>
                                @break
                              @case($item->order_status == 'Hủy')
                                <span style="background-color: red; padding: 5px; color: white;">Hủy</span>
                                @break
                              @default
                                  
                          @endswitch
                        </td>
                        <td>{{ $item->customer_phone }}</td>
                        <td>{{ $item->customer_email }}</td>
                        <td>{{ $item->created_at }}</td>
                        {{-- <td>{{ date('d-m-Y', strtotime($item->created_at)); }}</td> --}}
                        <td style="display:flex">
                            <a style="margin-right:5px"  href="{{ route('showOrder', $item->order_id) }}" class="active btn btn-warning" title="Xem chi tiết sản phẩm" ui-toggle-class="">
                                <i class="fa fa-eye text-success text-active"></i>  Show
                            </a>
                            <a style="margin-right:5px" href="{{ route('editOrder', $item->order_id) }}"  class="active btn btn-primary" title="Sửa Sản Phẩm" ui-toggle-class="">
                                <i class="fa fa-pencil text-success text-active"></i>  Edit
                            </a>
                            <a href="#"  onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này ?')"class="active btn btn-danger" title="Xóa Sản Phẩm" ui-toggle-class="">
                                <i class="fa fa-trash text-warning"></i> Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
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