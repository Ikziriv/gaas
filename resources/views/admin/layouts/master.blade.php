<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>PT. GASINDO</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{url('back/lib/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('back/lib/font-awesome/css/font-awesome.css')}}">

    <link rel="stylesheet" href="{{ url('css/print.css') }}" type="text/css" media="print">

    <link rel="stylesheet" type="text/css" href="{{url('back/stylesheets/theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('back/stylesheets/premium.css')}}">

    <link rel="stylesheet" href="{{url('css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/animate.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="{{url('css/sweetalert.css')}}">
    <link rel="stylesheet" href="{{url('css/twitter.css')}}">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <!-- Script Head -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="{{url('back/lib/jQuery-Knob/js/jquery.knob.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $(".knob").knob();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }); 
    </script>
</head>
<body class=" theme-blue">

    <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if(match) var color = match[1];
            if(color) {
                $('body').removeClass(function (index, css) {
                    return (css.match (/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});
            
        });
    </script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>

    @include('admin.partials.header')
    @include('admin.partials.sidebar')
    <div class="content">
        <div id="app">
            @yield('content')
        </div>
    </div>

    @yield('scripts')    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{url('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('back/lib/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{url('js/datatables.bootstrap.js')}}"></script>
    <script src="{{url('js/sweetalert.min.js')}}"></script>
    
    <script type="text/javascript" src="{{ url('js/tableExport/tableExport.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/tableExport/jquery.base64.js') }}"></script>

    <script type="text/javascript" src="{{ url('js/tableExport/jspdf/libs/sprintf.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/tableExport/jspdf/jspdf.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/tableExport/jspdf/libs/base64.js') }}"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
        // 
        // 
    </script>

    @include('admin.partials.flash')
    
  
</body>

</html>
