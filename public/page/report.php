<?php
// $cid = 48355537;
$cid = $_GET['videoNumber'];

$file = "http://39.108.157.1/extend/python/project/tmp/words_last2_".$cid.".txt";

$body = file($file);

$intention = array();
$polarity = array();
for ($j=0;$j<count($body);$j++) {
    $intention[$j] = substr($body[$j],0,1);
    $polarity[$j] = substr($body[$j],2,1);

}


$count = 0;
$count2 = 0;
$count3 = 0;
$count4 = 0;
$count5 = 0;
$count6 = 0;
$count7 = 0;
$count8 = 0;
$count9 = 0;
$count10 = 0;
$count11 = 0;
$count12 = 0;
$count13 = 0;
for ($j=0;$j<count($body);$j++) {
    $num = $intention[$j];
    switch ($num) {
        case "1":
            $count++;
            break;
        case "2":
            $count2++;
            break;
        case "3":
            $count3++;
            break;
        case "4":
            $count4++;
            break;
        case "5":
            $count5++;
            break;
        case "6":
            $count6++;
            break;
        case "7":
            $count7++;
            break;
        case "8":
            $count8++;
            break;
        case "9":
            $count9++;
            break;

        default:
            break;
    }
}
for ($j=0;$j<count($body);$j++) {
    $num = $polarity[$j];
    switch($num) {
        case "0":
            $count10++;
            break;
        case "1":
            $count11++;
            break;
        case "2":
            $count12++;
            break;
        case "3":
            $count13++;
            break; }

}
$weak = ($count+ $count2 +$count3) / ($count+ $count2 +$count3+$count4+ $count5 +$count6+$count7+ $count8 +$count9);
$medium = ($count4+ $count5 +$count6) / ($count+ $count2 +$count3+$count4+ $count5 +$count6+$count7+ $count8 +$count9);
$strong = ($count7+ $count8 +$count9) / ($count+ $count2 +$count3+$count4+ $count5 +$count6+$count7+ $count8 +$count9);
if ($weak-$strong > 0.20) {
    $intention = "weak";
}
else if ($weak-$strong < -0.20) {
    $intention = "strong";
}
else {

    $intention = "medium";
}


$neutral = $count10/($count10+$count11+$count12+$count13);
$positive = $count11/($count10+$count11+$count12+$count13);
$negative = $count12/($count10+$count11+$count12+$count13);
if ($positive-$negative > 0.20) {
    $polarity = "positive";
}
else if ($positive-$negative < -0.20) {
    $polarity = "negative";
}
else {

    $polarity = "neutral";
}



$json_arr = array("body"=>$body);

$json_obj = json_encode($json_arr);

?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Video report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />





    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>



    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="http://39.108.157.1/public/static/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="http://39.108.157.1/public/static/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="http://39.108.157.1/public/static/css/bootstrap.css">
    <!-- Flexslider  -->
    <link rel="stylesheet" href="http://39.108.157.1/public/static/css/flexslider.css">
    <!-- Theme style  -->
    <link rel="stylesheet" href="http://39.108.157.1/public/static/css/style2.css">

    <style>
        body,html {
            min-height:100%
        }
    </style>
    <!-- Modernizr JS -->
    <script src="http://39.108.157.1/public/static/js/modernizr-2.6.2.min.js"></script>

    <link rel="stylesheet" href="http://39.108.157.1/public/static/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="http://39.108.157.1/public/static/css/bootstrap-grid.min.css" />
    <link rel="stylesheet" type="text/css" href="http://39.108.157.1/public/static/css/zzsc.css">
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="http://39.108.157.1/public/static/js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var sum1=<?php echo $count; ?>;
            var sum2=<?php echo $count2; ?>;
            var sum3=<?php echo $count3; ?>;
            var sum4=<?php echo $count4; ?>;
            var sum5=<?php echo $count5; ?>;
            var sum6=<?php echo $count6; ?>;
            var sum7=<?php echo $count7; ?>;
            var sum8=<?php echo $count8; ?>;
            var sum9=<?php echo $count9; ?>;
            var data = google.visualization.arrayToDataTable([
                ['Intention', 'The number of words'],
                ['subtle',     sum1],
                ['slight low',     sum2],
                ['light',     sum3],
                ['ordinary',     sum4],
                ['medium',     sum5],
                ['general',     sum6],
                ['strong',     sum7],
                ['deep',     sum8],
                ['intense',     sum9],
            ]);

            var options = {
                title: 'Intention analysis'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        } </script>
    <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart2);
        function drawChart2() {
            var sum10=<?php echo $count10; ?>;
            var sum11=<?php echo $count11; ?>;
            var sum12=<?php echo $count12; ?>;
            var sum13=<?php echo $count13; ?>;

            var data = google.visualization.arrayToDataTable([
                ['Polarity', 'The number of words'],
                ['Neutral',     sum10],
                ['Positive',     sum11],
                ['Negative',     sum12],
                ['P&N',     sum13],

            ]);

            var options = {
                title: 'Polarity analysis'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

            chart.draw(data, options);
        }
    </script>
    <script>
        window.onload = function(){
            var number = <?php echo $cid; ?>;
            var img_number = "http://39.108.157.1/public/static/img/tmp/WorldCloud_"+number+".png";
            // alert(img_number);
            document.getElementById("worldCloud").src=img_number;
        }

    </script>
    <script type="text/javascript">
        function home(){
            window.location.href='http://39.108.157.1/public/page/index.html' + window.location.search;
        }
        function report(){
            window.location.href='http://39.108.157.1/public/page/report.php' + window.location.search;
        }
        function contact(){
            window.location.href='http://39.108.157.1/public/page/contact.html' + window.location.search;
        }

    </script>

</head>
<body>

<div id="fh5co-page">
    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
    <aside id="fh5co-aside" role="complementary" class="border js-fullheight">
        <h1 id="fh5co-logo"><a href="index.html"> Video Report</a></h1>
        <nav id="fh5co-main-menu" role="navigation">
            <ul>
                <li> <a href="javascript:void(0)" onclick="home()"> Home</a></li>
                <li  class="fh5co-active"> <a href="javascript:void(0)" onclick="report()">Video Report </a></li>
                <li> <a href="javascript:void(0)" onclick="contact()">Contact us </a></li>
                <li><a href="http://39.108.157.1/public/page/searchVideo.html">Return to Search Page</a></li>




            </ul>
        </nav>

        <h1 id="fh5co-logo"><img src="http://39.108.157.1/public/static/img/bilibili.jpg" height="176" width="250"></h1>
        <div class="fh5co-footer">
            <p><small>&copy; Copyright &copy; 2019 WKU BILIBILI TEST DEMO_1 </span> <span> Share video report into </a></span></small></p>
            <ul>
                <li><a href="https://www.facebook.com/"><i class="icon-facebook2"></i></a></li>
                <li><a href="https://twitter.com/"><i class="icon-twitter2"></i></a></li>
                <li><a href="https://www.instagram.com/"><i class="icon-instagram"></i></a></li>
                <li><a href="https://www.linkedin.com/"><i class="icon-linkedin2"></i></a></li>
            </ul>
        </div>

    </aside>

    <div id="fh5co-main">
        <aside id="fh5co-hero" class="js-fullheight">
            <div class="flexslider js-fullheight">
                <ul class="slides">
                    <li style="background-image:url(http://39.108.157.1/public/static/img/2.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">


                            <div class="row">
                                <br> <br> <br> <br>

                                <div class="col-md-4 col-md-offset-3 text-center js-fullheight slider-text"> <br> <br>
                                    <h1> Polarity Analysis </h1>
                                    <br><br>
                                    <div class="card" style="width:600px">
                                        <div id="piechart2" style="width: 100%; height: 400px;"> </div>
    					<div class="card-body">
                                        <h3 class="card-title">The comments in this video is <?php echo $polarity ?></h3>
                                        <p class="card-text">
                                            There are <?php echo round(($positive/1)*100).' %' ?>  comments are positive <br>
                                            There are <?php echo round(($negative/1)*100).' %' ?>  comments are negative <br>
                                            There are <?php echo round(($neutral/1)*100).' %' ?>  comments are neutral</p>
                                    </div>
                                </div>

                            </div>
                            <br>
                        </div>
                    </li>

                    <li style="background-image:url(http://39.108.157.1/public/static/img/2.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">


                            <div class="row">
                                <br> <br> <br> <br>

                                <div class="col-md-4 col-md-offset-3 text-center js-fullheight slider-text"> <br> <br>
                                    <h1> Intention Analysis </h1>
                                    <br><br>
                                    <div class="card" style="width:600px">
                                        <div id="piechart" style="width: 100%; height: 400px;"> </div>
                                        <div class="card-body">
                                            <h3 class="card-title">The audience's sentiment for this video is <?php echo $intention ?></h3>
                                            <p class="card-text">
                                                There are <?php echo round(($strong/1)*100).' %' ?>  comments are strong <br>
                                                There are <?php echo round(($weak/1)*100).' %' ?>  comments are weak <br>
                                                There are <?php echo round(($medium/1)*100).' %' ?>  comments are medium</p>
                                        </div>
                                    </div>

                                </div>
                                <br>
                            </div>
                    </li>

                    <li style="background-image:url(http://39.108.157.1/public/static/img/2.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">


                            <div class="row">
                                <br> <br> <br> <br>

                                <div class="col-md-4 col-md-offset-3 text-center js-fullheight slider-text"> <br> <br>
                                    <h1> Tag Cloud </h1>
                                    <br><br>
                                    <div class="card" style="width:600px">
                                        <img src="http://39.108.157.1/public/static/img/tmp/WorldCloud_<?php echo $cid ?>.png">
                                        <div class="card-body">
                                            <h3 class="card-title"></h3>
                                            <p class="card-text"> </p>

                                        </div>
                                    </div>

                                </div>
                                <br>
                            </div>
                    </li>


                </ul>
            </div>
        </aside>



    </div>
</div>




<!-- jQuery -->
<script src="http://39.108.157.1/public/static/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="http://39.108.157.1/public/static/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="http://39.108.157.1/public/static/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="http://39.108.157.1/public/static/js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="http://39.108.157.1/public/static/js/jquery.flexslider-min.js"></script>




<!-- MAIN JS -->
<script src="http://39.108.157.1/public/static/js/main.js"></script>

</body>
</html>

