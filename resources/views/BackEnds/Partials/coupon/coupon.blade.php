@extends('BackEnds.layoutAdmin')
@section('titleAdminPage','Danh Sách Mã Giảm')
@section('mainAdmin')
<div class="table-agile-info">
    <?php 
    // $messages = Session::get('message');
    // if ($messages) {
    //     echo '<div class="alert alert-success" role="alert">';
    //         echo $messages;
    //         Session::put('message',null);
    //     echo '</div>';
    // }
    ?>
    @if (Session::has('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{{ Session::get('success') }}</strong>
    </div>
    @endif
    <div class="text-right" style="margin-bottom: 5px">
        <a href="{{ route('coupon.create') }}" title="Thêm Mã Giảm">
            <span class="btn btn-success" value="add">
                <i class="fa fa-plus"></i>
            </span>
        </a>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        @yield('titleAdminPage')
      </div>
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
              <th class="text-center">Tên Mã Giảm Giá</th>
              <th class="text-center">Mã Giảm</th>
              <th class="text-center">Số Lượng Mã Giảm</th>
              <th class="text-center">Điều Kiện Giảm Giá</th>
              <th class="text-center">Số Giảm theo % Hoặc Theo Tiền</th>
              <th class="text-center">Ngày Tạo</th>
              <th class="text-center">Ngày Cập Nhật</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($coupon as $item)
            <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{ $item->name }}</td>
                <td><span class="text-ellipsis">{{ $item->code }}</span></td>
                <td>{{ $item->time }}</td>
                <td style="text-align:center">
                    @if ($item->condition == 1)
                        <span class="text-ellipsis">
                            Giảm theo %
                        </span>
                    @else
                    <span class="text-ellipsis">
                        Giảm theo Tiền
                    </span>
                    @endif
                </td>
                
                <td>{{ number_format($item->number) }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td style="display:flex">
                <a style="margin-right:5px"href="{{ route('coupon.edit', $item->id, 'edit') }}" class="active btn btn-primary" title="Sửa Mã Giảm" ui-toggle-class="">
                    <i class="fa fa-pencil text-success text-active"></i>  Edit
                </a>
                {{-- <a href="" onclick="return confirm('Bạn có chắc muốn xóa danh mục này ?')"class="active btn btn-danger" title="Xóa Mã Giảm" ui-toggle-class="">
                    <i class="fa fa-trash text-warning"></i> Delete
                </a> --}}
                <form action="{{ route('coupon.destroy', $item->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa danh mục này ?')" class="btn btn-danger"><i class="fa fa-trash text-warning"></i> Delete</button>
                </form>
                </td>
              </tr>
            @endforeach
            
            
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="text-right">
            
          </div>
          {{-- <div class="col-sm-7 text-right text-center-xs">
            
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div> --}}
        </div>
      </footer>
      
    </div>
  </div>
@endsection