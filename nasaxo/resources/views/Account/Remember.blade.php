@extends('_layout')
@section('title','Quên mật khẩu')
@section('link')
@parent
<!-- custom file css -->
<link rel="stylesheet" href="{!! url('public/css/Account/Index.css') !!}">
@stop
@section('content')
@stop
<!-- my script -->
@section('script')
@parent
<script type="text/javascript" src="{!! url('public/js/Account/Remember.js') !!}"></script>
@stop
