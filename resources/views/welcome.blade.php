<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hellotask Note Application</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- Bootstrap core CSS-->
    <link href="{{asset('backend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{asset('backend/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{asset('backend/css/sb-admin.css')}}" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer" id="page-top">
<div id="app">
    <!-- Navigation-->
    {{--<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top top-left-bar" id="mainNav" v-show="$route.path === '/' || $route.path === '/register' ? false : true"  style="display:none">--}}

    <nav-bar></nav-bar>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <router-view></router-view>

        </div>
    </div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>
<!-- Bootstrap core JavaScript-->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
{{--<script>--}}
    {{--let token = localStorage.getItem('token');--}}
    {{--if(token){--}}
        {{--// $('#top-left-bar').css("display", "");--}}
        {{--$('.top-left-bar').css("display", "");--}}
    {{--}--}}
{{--</script>--}}
<!-- Core plugin JavaScript-->
<script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Page level plugin JavaScript-->
{{--<script src="{{asset('backend/vendor/chart.js/Chart.min.js')}}"></script>--}}
{{--<script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.js')}}"></script>--}}
<!-- Custom scripts for all pages-->
<script src="{{asset('backend/js/sb-admin.min.js')}}"></script>
<!-- Custom scripts for this page-->
{{--<script src="{{asset('backend/js/sb-admin-datatables.min.js')}}"></script>--}}
{{--<script src="{{asset('backend/js/sb-admin-charts.min.js')}}"></script>--}}

</div>
</body>

</html>
