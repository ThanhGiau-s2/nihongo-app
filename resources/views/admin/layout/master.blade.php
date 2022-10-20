<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nihongo_Trang web học tiếng Nhật</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <base href="{{asset('')}}"/>
    <link rel="stylesheet" href="admin/assets/css/normalize.css">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="admin/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="admin/assets/scss/style.css">
    <link href="admin/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
    <link href="admin/assets/plugins/datatables/datatables.min.css" rel="stylesheet" />
    <link href="admin/assets/plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <style>
        .caret {
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: 2px;
            vertical-align: middle;
            border-top: 4px dashed;
            border-top: 4px solid\9;
            border-right: 4px solid transparent;
            border-left: 4px solid transparent;
        }
        .tieude{
            font-size:36px;
            font-weight:bold;
            margin-top:40px;
            color:red;
            text-align:center;
        }
        .wrap-content{
            text-align: center;
            margin-top:30px;
        }
        .wrap-content p{
            font-size:21px;
            font-weight:bold;
            margin-top:20px;
        }
        .error{
            color:red;
        }
    </style>
</head>    
    <!--/head-->
<body>
    @include('admin.layout.menu')
    <div id="right-panel" class="right-panel">
	    @include('admin.layout.header')    
        @yield('content')
    </div>   
    <script src="admin/assets/plugins/jquery/jquery.min.js"></script>
    <script src="admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="admin/assets/js/plugins.js"></script>
    <script src="admin/assets/plugins/datatables/datatables.min.js" ></script>
    <script src="admin/assets/plugins/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="admin/assets/plugins/datatables/Buttons-1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="admin/assets/plugins/datatables/pdfmake-0.1.32/pdfmake.min.js"></script>
    <script src="admin/assets/plugins/datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="admin/assets/plugins/datatables/Buttons-1.5.1/js/buttons.bootstrap4.min.js"></script>
    <script src="admin/assets/plugins/datatables/Buttons-1.5.1/js/buttons.colVis.min.js"></script>
    <script src="admin/assets/plugins/datatables/Buttons-1.5.1/js/buttons.html5.min.js"></script>
    <script src="admin/assets/plugins/datatables/Buttons-1.5.1/js/buttons.print.min.js"></script>
    <script src="admin/assets/plugins/Bootstrap-Confirmation-2/bootstrap-confirmation.min.js"></script> 
    <script>
      $.getScript('admin/assets/js/main.js');
    </script>
</body>
</html>