<?php
namespace app\index\controller;

$cid = $_GET['videoNumber'];

$command="python /www/wwwroot/bilibili_wku/extend/python/project/blbl.py ";
$command = $command.$cid;
echo exec($command);
$url = "http://39.108.157.1/public/page/index.html?videoNumber=".$cid;

?>
<html lang="en">
<head>
    <meta id = "seach_URL" charset="UTF-8" http-equiv="refresh"  content = "1;<?php echo $url; ?>">
<!--    <meta id = "seach_URL" charset="UTF-8">-->
    <title>Result</title>
</head>

<body>
    <!--<input type="button" value="test" onclick="test()">-->
</div>

</body>
</html>