<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Danh Mục Sản Phẩm</h2>
        <!--category-productsr-->
        <div class="panel-group category-products" id="accordian">
            <div class="panel panel-default">
                @foreach ($danhmuc as $item)
                <div class="panel-heading">
                    <h4 class="panel-title"><a class="" href="{{ route('danh-muc-san-pham', $item->category_id) }}">{{ $item->category_name }}</a></h4>
                </div>
                @endforeach
            </div>
        </div>
        <!--/category-products-->
    
        <div class="brands_products"><!--brands_products-->
            <h2>Thương Hiệu Sản Phẩm</h2>
            <div class="brands-name">
                @foreach ($thuonghieu as $th)
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{ route('thuong-hieu-san-pham', $th->brand_id) }}"> <span class="pull-right">(50)</span>{{ $th->brand_name }}</a></li>
                </ul>
                @endforeach
            </div>
        </div><!--/brands_products-->
        
        <div class="price-range"><!--price-range-->
            <h2>Price Range</h2>
            <div class="well text-center">
                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
            </div>
        </div><!--/price-range-->
        
        <div class="shipping text-center"><!--shipping-->
            <img src="{{asset('FrontEnds/images/home/shipping.jpg')}}" alt="" />
        </div><!--/shipping-->
    
    </div>
</div>