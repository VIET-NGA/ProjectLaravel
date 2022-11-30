
<!DOCTYPE html>
<html>
<head>
    <title>ĐẶT HÀNG</title>
    <style>
        *{margin:0;padding:0}
        
        .dongdathang{
            width:100%;
            margin:0 auto;
            max-width:1000px;
        }
        .form{
            width:100%;
        }
        h3{color:red;width:100%;text-align:center;
        font-size:20px;padding:10px 0px;}
        
        strong{
            font-size:14px;
        }
        table#order {
             border-collapse: collapse;
             width:100%;
        }
        table#order tr td{
            padding:5px;
            text-align:center;
            box-sizing:border-box;
        }
        table.form-info tr td strong{
            padding-left:5px;
        }
    </style>
</head>
<body>
  <div class="dongdathang">
        <h3>ĐƠN ĐẶT HÀNG</h3>
        <div class="form">
                <div>
                    <h4><b>Kính gửi Quý khách hàng: {{ $data['khachhang']['shipping_name'] }}</b></h4>
                    <span> Chúng tôi xin chân thành cám ơn Quý khách đã tin tưởng sản phẩm của chúng tôi, chúng tôi gửi Qúy khách hàng thông tin sản phẩm như sau:</span>
                </div>
                <table class="form-info">
 
                    <tr class="form-group">
                        <td><label>Tên khách hàng:</label></td>
                        <td><strong>{{ $data['khachhang']['shipping_name'] }}</strong></td>
                    </tr>
                    <tr class="form-group">
                       <td> <label>Ngày:</label></td>
                       <td> <strong>{{ $data['order']['created_at'] }}</strong></td>
                    </tr>
                    <tr class="form-group">
                      <td>  <label>Số điện thoại: </label></td>
                       <td> <strong>{{ $data['khachhang']['shipping_phone'] }}</strong></td>
                    </tr>
                    <tr class="form-group" style="width:100%">
                       <td> <label>Địa chỉ:</label></td>
                       <td> <strong> {{ $data['khachhang']['shipping_address'] }}</strong></td>
                    </tr>
                </table>
                <div class="form-order">
                    <table border="1" id="order">
                        <tr>
                            <th>STT</th>
                            <th>Sản phẩm</th>
                            <th>Đơn vị</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành Tiền</th>
                        </tr>
                        @foreach($data['order_detail'] as $key=>$product)
                            <tr>
                                <td> {{ $key }}</td>
                                <td>{{$product['product_name']}}</td>
                                <td>cái</td>
                                <td>{{$product['product_sales_quantity']}}</td>
                                <td>{{number_format($product['product_price'])}} đ</td>
                                <td>{{number_format($product['product_price'] * $product['product_sales_quantity'])}} đ</td>
                            </tr>
                        @endforeach
 
                        <tr>
                            <td colspan="5">Tổng tiền:</td>
                            <td><b>{{ $data['order']['order_total']}} đ </b></td>
                        </tr>
 
                    </table>
                </div>
                <table class="form-info">
                    <tr class="form-group" style="width:100%">
                       <td> <label>Ngày giao hàng:</label></td>
                        <td><strong>{{$data['order']['created_at']}}</strong></td>
                    </tr>
                    <tr class="form-group" style="width:100%">
                       <td> <label>Địa điểm giao hàng:</label></td>
                       <td> <strong>{{ $data['khachhang']['shipping_address'] }}</strong></td>
                    </tr>
                </table>
                 
        </div>
  </div>
</body>
</html>
