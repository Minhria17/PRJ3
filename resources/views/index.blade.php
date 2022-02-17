@extends('adminlte::page')

@section('title', 'Trang chủ')

@section('content_header')
    <h1>Quản Lý Sinh Viên</h1>
@stop
@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$sinhviens}}</h3>

                    <p>Sinh Viên</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="http://127.0.0.1:8000/student" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$monhocs}}</h3>

                    <p>Môn học</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="http://127.0.0.1:8000/subject" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$lops}}</h3>

                    <p>Lớp học</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="http://127.0.0.1:8000/class" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$giangviens}}</h3>

                    <p>Giảng Viên</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="http://127.0.0.1:8000/lecturer" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    
    <!-- /.row (main row) -->
@stop

@section('css')
@stop

@section('js')
@stop