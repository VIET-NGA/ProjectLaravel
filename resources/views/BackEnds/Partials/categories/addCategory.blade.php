@extends('BackEnds.layoutAdmin')
@section('titleAdminPage','Thêm Danh Mục')
    
@section('mainAdmin')
<div class="row">
    <div class="col-lg-12">
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
                    <form action="{{ route('postCategory') }}" class="cmxform form-horizontal " id="signupForm" method="post" action="" novalidate="novalidate">
                        @csrf
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Tên Danh Mục <span class="text-danger">(*)</span></label>
                            <div class="col-lg-6">
                                <input class="@error('categoryName') is-invalid @enderror form-control" id="cate" name="categoryName" value="{{ old('categoryName') }}" type="text">
                                @error('categoryName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Mô tả </label>
                            <div class="col-lg-6">
                                <textarea id="editor" style="resize: none" rows="8" name="descriptionName" class="form-control" ></textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Hiện thị</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="cateStatus" id="">
                                    <option value="0">Hiện</option>
                                    <option value="1">Ẩn</option>
                                </select>
                            </div>
                        </div>
                       

                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Thêm</button>
                                <a href="{{ route('category') }}"><button class="btn btn-default" type="button">Quay lại</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection