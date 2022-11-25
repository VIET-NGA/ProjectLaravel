@extends('BackEnds.layoutAdmin')
@section('titleAdminPage','Sửa Thương Hiệu')
    
@section('mainAdmin')
<div class="row">
    <div class="col-lg-12">
        <?php 
    //     $messages = Session::get('message');
    // if ($messages) {
    //     echo '<div class="alert alert-success" role="alert">';
    //         echo $messages;
    //         Session::put('message',null);
    //     echo '</div>';
    // }

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
                    <form action="{{ route('updateBrand', $result->brand_id) }}" class="cmxform form-horizontal " id="signupForm" method="post" action="" novalidate="novalidate">
                        @csrf
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Tên Thương Hiệu <span class="text-danger">(*)</span></label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="cate" value="{{ $result->brand_name }}" name="brandName" type="text">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Mô tả </label>
                            <div class="col-lg-6">
                                <textarea id="editor" style="resize: none" rows="8" name="descriptionName" class="form-control" >{{ $result->brand_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Hiện thị</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="statusName" id="">
                                    @if ($result->brand_status==0)
                                        <option value="0" selected>Hiện</option>
                                        <option value="1">Ẩn</option>
                                    @else
                                        <option value="0">Hiện</option>
                                        <option value="1" selected>Ẩn</option>
                                    @endif
                                   
                                </select>
                            </div>
                        </div>
                       

                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Cập nhật</button>
                                <a href="{{ route('brand') }}"><button class="btn btn-default" type="button">Quay lại</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection