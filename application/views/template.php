<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="/media/flatui/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="/media/flatui/bootstrap/css/prettify.css">
        <link rel="stylesheet" href="/media/flatui/css/flat-ui.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <?php echo $view ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        
        <!-- FlatUI JS =============================-->
        <script src="/media/flatui/js/jquery-1.8.3.min.js"></script>
        <script src="/media/flatui/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="/media/flatui/js/jquery.ui.touch-punch.min.js"></script>
        <script src="/media/flatui/js/bootstrap.min.js"></script>
        <script src="/media/flatui/js/bootstrap-select.js"></script>
        <script src="/media/flatui/js/bootstrap-switch.js"></script>
        <script src="/media/flatui/js/flatui-checkbox.js"></script>
        <script src="/media/flatui/js/flatui-radio.js"></script>
        <script src="/media/flatui/js/jquery.tagsinput.js"></script>
        <script src="/media/flatui/js/jquery.placeholder.js"></script>
        <script src="/media/flatui/js/jquery.stacktable.js"></script>
        <script src="http://vjs.zencdn.net/4.1/video.js"></script>
        <script src="/media/flatui/js/application.js"></script>
        
        
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
