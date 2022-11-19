<div id="sidebar" class="nav-collapse">
    <!-- sidebar menu start-->
    <div class="leftside-navigation">
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="{{ (request()->segment(2)=='dashboard') ? ' active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Tổng Quan</span>
                </a>
            </li>
            <li>
                <a class="{{ (request()->segment(2)=='category') ? ' active' : '' }}" href="{{ route('category') }}">
                    <i class="fa fa-navicon"></i>
                    <span>Danh Mục Sản Phẩm</span>
                </a>
            </li>
            <li>
                <a class="{{ (request()->segment(2)=='brand') ? ' active' : '' }}" href="{{ route('brand') }}">
                    <i class="fa fa-cube"></i>
                    <span>Thương Hiệu Sản Phẩm</span>
                </a>
            </li>
            <li>
                <a class="{{ (request()->segment(2)=='product') ? ' active' : '' }}" href="{{ route('product') }}">
                    <i class="fa fa-th"></i>
                    <span>Sản Phẩm</span>
                </a>
            </li>
            <li>
                <a class="{{ (request()->segment(2)=='order') ? ' active' : '' }}" href="{{ route('order') }}">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Đơn Hàng</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- sidebar menu end-->
</div>