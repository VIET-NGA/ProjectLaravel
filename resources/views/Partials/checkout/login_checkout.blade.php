@extends('layout')
@section('title_page','Đăng nhập hoặc Đăng ký mới')
@section('main')
<div class="row">
    <div class="col-sm-4 col-sm-offset-1">
        <?php 
                $content = Cart::content();
                $messages = Session::get('message');
                if ($messages) {
                    echo '<div class="alert alert-success" role="alert">';
                        echo $messages;
                        Session::put('message',null);
                    echo '</div>';
                }
            ?>
        <div class="login-form"><!--login form-->
            <h2>ĐĂNG NHẬP TÀI KHOẢN</h2>
            <form action="{{ route('saveLogin') }}" method="post">
                @csrf
                <input type="email" name="email" placeholder="email account" />
                <input type="password" name="password" placeholder="password" />
                <span>
                    <input type="checkbox" class="checkbox"> 
                    Nhớ
                </span>
                <button type="submit" class="btn btn-default">Đăng nhập</button>
            </form>
        </div><!--/login form-->
    </div>
    <div class="col-sm-1">
        <h2 class="or">Hoặc</h2>
    </div>
    <div class="col-sm-4">
        <div class="signup-form"><!--sign up form-->
            <h2>TẠO TÀI KHOẢN MỚI!</h2>
            <form action="{{ route('saveRegister') }}" method="post">
                @csrf
                <input type="text" name="username" placeholder="Name"/>
                <input type="email" name="email" placeholder="Email Address"/>
                <input type="text" name="phone" placeholder="phone"/>
                <input type="password" name="password" placeholder="Password"/>
                <button type="submit" class="btn btn-default">Đăng ký</button>
            </form>
        </div><!--/sign up form-->
    </div>
</div>
@endsection