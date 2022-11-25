@extends('BackEnds.layoutAdmin')
@section('titleAdminPage','Danh mục Sản Phẩm')
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
        <a href="{{ route('addCategory') }}" title="Thêm danh mục">
            <span class="btn btn-success" value="add">
                <i class="fa fa-plus"></i>
            </span>
        </a>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        @yield('titleAdminPage')
      </div>
      @if (!empty($result))
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
              <th>Tên Danh Mục</th>
              <th>Mô Tả</th>
              <th>Hiển Thị</th>
              <th>Ngày Tạo</th>
              <th>Ngày Cập Nhật</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($result as $cat)
            <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{ $cat->category_name }}</td>
                <td><span class="text-ellipsis">{!! $cat->category_description !!}</span></td>
                <td style="text-align:center">
                    @if ($cat->category_status==0)
                    <span class="text-ellipsis bg-success">
                        <span style="font-weight: bold;margin: 5px; color: #ffffff">Hiển Thị</span>
                    </span>
                    @else
                    <span class="text-ellipsis bg-danger">
                        <span style="font-weight: bold;margin: 5px; color: #ffffff">Ẩn</span>
                    </span>
                    @endif
                    
                </td>
                <td>{{ $cat->created_at }}</td>
                <td>{{ $cat->updated_at }}</td>
                <td style="display:flex">
                  <a style="margin-right:5px"href="{{ route('editCategory', $cat->category_id) }}" class="active btn btn-primary" title="Sửa Danh Mục" ui-toggle-class="">
                    <i class="fa fa-pencil text-success text-active"></i>  Edit
                </a>
                <a href="{{ route('deleteCategory', $cat->category_id) }}" onclick="return confirm('Bạn có chắc muốn xóa danh mục này ?')"class="active btn btn-danger" title="Xóa Danh Mục" ui-toggle-class="">
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
          <div class="text-right">
            {{ $result->links() }}
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
      @else
      <div class="alert-warning" style="margin-top: 15px; text-align: center; font-size:17px">Danh Sách Sản Phẩm Trống</div>
      @endif
      
    </div>
  </div>
@endsection