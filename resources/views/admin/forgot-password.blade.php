@extends('adminlte::master')
@section('title', 'Lockscreen')
@section('body_class','lockscreen')
@section('adminlte_css')
    <!-- Custom css forgot password -->
    <link rel="stylesheet" href="{{ asset('css/forgot-password.css')}}">
@stop
@section('body')
    <!-- Automatic element centering -->
    <div class="forgot-password-wrapper">
        <div class="forgot-password-logo">
            <a href="#"><b>Admin</b></a>
        </div>
        <!-- START LOCK SCREEN ITEM -->
        <div class="forgot-password-item">

            <!-- forgot-password credentials (contains the form) -->
            <form class="forgot-password-credentials" action="{{route('admin.postForgotPassword')}}" method="post" id="frm-forgot-password">
                {{ csrf_field() }}
                <div class="input-group">
                    <!-- Loader -->
                    <div class="spinner spinner-email" style="display: none">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>
                    </div>
                    <input type="email" name="email" class="form-control" placeholder="Email của bạn" id="email" required>
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-flat" id="btn-forgot-password"><i class="fa fa-arrow-right text-muted"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.forgot-password-item -->
        <div class="help-block text-center">
            Nhập Email của bạn
        </div>
        <div class="text-center">
            <a href="{{route('admin.getLogin')}}">Hoặc đăng nhập bằng một người dùng khác</a>
        </div>
    </div>
    <!-- /.center -->
@stop
@section('adminlte_js')
    <!-- forgot-password -->
    <script src="{{ asset('js/forgot-password.js')}}"></script>
    <script>
        @if(Session('error')==1)
        toastr.error('Email không đúng vui lòng kiểm tra lại', 'Thông Báo!', {closeButton:true});
        @endif
    </script>
@stop

